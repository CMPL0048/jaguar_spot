@extends('plantilla')
@section('titulo', __('messages.available_parking') . ' · Jaguar Spot')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('estilos/elegir_estacionamiento.css') }}">
@endsection

@section('nav')
      <ul>
        <li><a href="/"><i class="fas fa-home"></i> {{ __('messages.home') }}</a></li>
        @auth
          <li><a href="{{ route('mis_reservas') }}">{{ __('messages.my_reservas_icon') }}</a></li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="logout-link"><i class="fa-solid fa-sign-out-alt"></i> {{ __('messages.logout') }}</button>
            </form>
          </li>
        @else
          <li><a href="/login"><i class="fa-solid fa-sign-in-alt"></i> {{ __('messages.login') }}</a></li>
          <li><a href="/register"><i class="fa-solid fa-user-plus"></i> {{ __('messages.register') }}</a></li>
        @endauth
        <li>@include('components.language-selector')</li>
      </ul>
@endsection

@section('contenido')
<div class="container">
    <h1 class="title">🚗 {{ __('messages.available_parking') }}</h1>

    <div class="map-container">
        <div id="mapa-container">
            <img src="{{ asset('imagenes/mapa-utn.png') }}"
                 usemap="#utn-map"
                 id="mapa"
                 alt="{{ __('messages.parking_name') }}">

            <!-- Canvas para el efecto hover -->
            <canvas id="overlay"></canvas>

            <!-- Tooltip flotante -->
            <div id="label"></div>

            <map name="utn-map">
                <area alt="Estacionamiento Turismo"
                      title="Estacionamiento Turismo"
                      href="{{ route('estacionamientos.show', 1) }}"
                      coords="121,602,147,536,306,555,300,623"
                      shape="poly">

                <area alt="Estacionamiento Gimnasio"
                      title="Estacionamiento Gimnasio"
                      href="{{ route('estacionamientos.show', 2) }}"
                      coords="634,472,622,570,745,587,758,484"
                      shape="poly">

                <area alt="Estacionamiento Rectoría"
                      title="Estacionamiento Rectoría"
                      href="{{ route('estacionamientos.show', 3) }}"
                      coords="419,32,415,61,399,79,397,99,396,126,492,142,558,150,568,57,499,51,458,48,445,38,439,33"
                      shape="poly">

                <area alt="Estacionamiento Vinculación"
                      title="Estacionamiento Vinculación"
                      href="{{ route('estacionamientos.show', 4) }}"
                      coords="163,211,226,221,213,337,150,331"
                      shape="poly">
            </map>
        </div>
    </div>

    <h2 class="subtitle">{{ __('messages.select_parking') }}</h2>

    <div class="parking-grid">
        @foreach($estacionamientos as $estacionamiento)
            <a href="{{ route('estacionamientos.show', $estacionamiento->id) }}" class="parking-card">
                <div class="icon">
                    <i class="fa-solid fa-square-parking"></i>
                </div>
                <h3>{{ $estacionamiento->nombre }}</h3>
                <p><i class="fa-solid fa-car-side"></i> {{ __('messages.capacity') }}: {{ $estacionamiento->capacidad }} {{ __('messages.spaces') }}</p>
            </a>
        @endforeach
    </div>
</div>

<!-- Librería para hacer el image map responsivo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mapa = document.getElementById('mapa');
    const overlay = document.getElementById('overlay');
    const label = document.getElementById('label');
    const areas = document.querySelectorAll('area');

    if (!mapa || !overlay || !label) {
        console.error('Faltan elementos del DOM');
        return;
    }

    // Hacer el image map responsivo
    imageMapResize();

    const ctx = overlay.getContext('2d');

    // Ajustar canvas al tamaño de la imagen
    function ajustarCanvas() {
        overlay.width = mapa.clientWidth;
        overlay.height = mapa.clientHeight;
    }

    window.addEventListener('resize', function() {
        ajustarCanvas();
        imageMapResize(); // Re-escalar el mapa también
    });

    mapa.addEventListener('load', ajustarCanvas);

    // Ajustar inmediatamente si la imagen ya está cargada
    if (mapa.complete && mapa.naturalWidth > 0) {
        ajustarCanvas();
    }

    // Dibujar zona resaltada DIRECTAMENTE con las coordenadas del area
    // (ya están escaladas por imageMapResizer)
    function dibujar(coords) {
        ctx.clearRect(0, 0, overlay.width, overlay.height);
        ctx.fillStyle = 'rgba(0, 150, 255, 0.4)';
        ctx.strokeStyle = '#0099ff';
        ctx.lineWidth = 2;

        const puntos = coords.split(',').map(Number);
        ctx.beginPath();
        ctx.moveTo(puntos[0], puntos[1]);
        for (let i = 2; i < puntos.length; i += 2) {
            ctx.lineTo(puntos[i], puntos[i + 1]);
        }
        ctx.closePath();
        ctx.fill();
        ctx.stroke();
    }

    // Eventos para cada área
    areas.forEach(area => {
        area.addEventListener('mouseenter', function(e) {
            // Usar las coordenadas actuales del area (ya escaladas por imageMapResizer)
            dibujar(area.getAttribute('coords'));
            label.textContent = area.getAttribute('alt');
            label.style.display = 'block';
        });

        area.addEventListener('mousemove', function(e) {
            const rect = mapa.getBoundingClientRect();
            label.style.left = (e.clientX - rect.left) + 'px';
            label.style.top = (e.clientY - rect.top) + 'px';
        });

        area.addEventListener('mouseleave', function() {
            ctx.clearRect(0, 0, overlay.width, overlay.height);
            label.style.display = 'none';
        });
    });
});
</script>
@endsection
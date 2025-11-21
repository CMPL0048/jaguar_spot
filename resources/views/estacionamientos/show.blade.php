@extends('plantilla')
@section('titulo', 'Selecciona un Puesto · Jaguar Spot')
@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/estacionamientos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;&display=swap" rel="stylesheet">
@endsection
@section('nav')
    <ul>
        <li><a href="/"><i class="fas fa-home"></i> <span data-i18n="Inicio">Inicio</span></a></li>
        <li><a href="/estacionamientos"><i class="fas fa-parking"></i> <span data-i18n="Estacionamientos">Estacionamientos</span></a></li>
        @auth
            <li><a href="{{ route('mis_reservas') }}"><span data-i18n="Puestos Reservados">Puestos Reservados</span></a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-link"><i class="fa-solid fa-sign-out-alt"></i>
                        <span data-i18n="Cerrar Sesión">Cerrar Sesión</span></button>
                </form>
            </li>
        @else
            <li><a href="/login"><i class="fa-solid fa-sign-in-alt"></i> <span data-i18n="Iniciar Sesión">Iniciar Sesión</span></a></li>
            <li><a href="/register"><i class="fa-solid fa-user-plus"></i> <span data-i18n="Registrarse">Registrarse</span></a></li>
        @endauth
    </ul>
@endsection

@section('contenido')

    <!-- Navbar de Estacionamientos -->
    <nav class="navbar-estacionamientos">
        @foreach ($todosLosEstacionamientos->unique('nombre') as $e)
            <a href="{{ route('estacionamientos.show', $e->id) }}"
                class="nav-link {{ $e->id === $estacionamiento->id ? 'active' : '' }}">
                <span data-i18n="{{ $e->nombre }}">{{ $e->nombre }}</span>
            </a>
        @endforeach
    </nav>


    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                });
            });
        </script>
    @endif

    <h1 class="titulo-estacionamiento" data-i18n="{{ $estacionamiento->nombre }}">{{ $estacionamiento->nombre }}</h1>
    <h2 class="subtitulo-estacionamiento" data-i18n="Selecciona un Puesto">Selecciona un Puesto</h2>

    <div class="parking-lot">
        @foreach ($estacionamiento->puestos as $puesto)
            <form action="{{ route('puestos.reservar', $puesto->id) }}" method="POST" class="puesto-form">
                @csrf
                <button type="submit"
                    class="puesto
                        {{ $puesto->estado === 'aceptado' ? 'ocupado' : ($puesto->tipo === 'discapacitado' ? 'discapacitado' : 'disponible') }}">

                    <i class="{{ $puesto->tipo === 'discapacitado' ? 'fa-solid fa-wheelchair' : 'fa-solid fa-car' }}"></i>
                    <span>{{ $puesto->numero_puesto }}</span>
                </button>
            </form>
        @endforeach
    </div>
@endsection

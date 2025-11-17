@extends('plantilla')
@section('titulo', __('messages.select_spot') . ' · Jaguar Spot')
@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/estacionamientos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;&display=swap" rel="stylesheet">
@endsection
@section('nav')
    <ul>
        <li><a href="/"><i class="fas fa-home"></i> {{ __('messages.home') }}</a></li>
        <li><a href="/estacionamientos"><i class="fas fa-parking"></i> {{ __('messages.parking') }}</a></li>
        @auth
            <li><a href="{{ route('mis_reservas') }}">{{ __('messages.my_reservas_icon') }}</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-link"><i class="fa-solid fa-sign-out-alt"></i>
                        {{ __('messages.logout') }}</button>
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

    <!-- Navbar de Estacionamientos -->
    <nav class="navbar-estacionamientos">
        @foreach ($todosLosEstacionamientos as $e)
            <a href="{{ route('estacionamientos.show', $e->id) }}"
                class="nav-link {{ $e->id === $estacionamiento->id ? 'active' : '' }}">
                {{ $e->nombre }}
            </a>
        @endforeach
    </nav>


    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: '{{ __('messages.error') }}',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#d33',
                    confirmButtonText: '{{ __('messages.close') }}'
                });
            });
        </script>
    @endif

    <h1 class="titulo-estacionamiento">{{ $estacionamiento->nombre }}</h1>
    <h2 class="subtitulo-estacionamiento">{{ __('messages.select_spot') }}</h2>

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

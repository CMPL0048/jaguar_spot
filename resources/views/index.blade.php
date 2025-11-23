@extends('plantilla')
@section('titulo', 'Bienvenido a Jaguar Spot')

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
    <div class="section_color">
        <h1 data-i18n="Bienvenido a Jaguar Spot">Bienvenido a Jaguar Spot</h1>
        <h2 data-i18n="El estacionamiento de la UT Nayarit">El estacionamiento de la UT Nayarit</h2>

        <img src="imagenes/jaguar_inicio.jpg" class="img_inicio">
        <p data-i18n="Jaguar Spot te permitirá tener el control de tu estacionamiento dentro de la universidad, ¿qué esperas para estacionarte de manera efectiva?">Jaguar Spot te permitirá tener el control de tu estacionamiento dentro de la universidad, ¿qué esperas para estacionarte de manera efectiva?</p>
        <br><br><br>
        <a href="{{ route('estacionamientos.index') }}" class="btn">
            <span data-i18n="Comenzar a usar">Comenzar a usar</span>
        </a>
        <br><br>
    </div>


@endsection

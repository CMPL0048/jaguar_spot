@extends('plantilla')
@section('titulo', 'Inicio · Jaguar Spot')

@section('nav')
    <ul>
        <li><a href="/"><i class="fas fa-home"></i> Inicio</a></li>
        <li><a href="/estacionamientos"><i class="fas fa-parking"></i> Estacionamientos</a></li>
        @auth
            <li><a href="{{ route('mis_reservas') }}">Puestos Reservados</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-link"><i class="fa-solid fa-sign-out-alt"></i> Cerrar Sesión</button>
                </form>
            </li>
        @else
            <li><a href="/login"><i class="fa-solid fa-sign-in-alt"></i> Iniciar Sesión</a></li>
            <li><a href="/register"><i class="fa-solid fa-user-plus"></i> Registrarse</a></li>
        @endauth
    </ul>
@endsection

@section('contenido')
    <div class="section_color">
        <h1>Bienvenido a Jaguar Spot</h1>
        <h2>El estacionamiento de la UT Nayarit</h2>

        <img src="imagenes/jaguar_inicio.jpg" class="img_inicio">
        <p>Jaguar Spot te permitirá tener el control de tu estacionamiento dentro de la universidad, ¿qué esperas para estacionarte de manera efectiva?</p>
        <br><br><br>
        <button class="btn">
            Comenzar a usar 
        </button>
        <br><br>
    </div>
    

@endsection
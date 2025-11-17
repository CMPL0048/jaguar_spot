@extends('plantilla')
@section('titulo', __('messages.welcome') . ' · Jaguar Spot')

@section('nav')
    <ul>
        <li><a href="/"><i class="fas fa-home"></i> {{ __('messages.home') }}</a></li>
        <li><a href="/estacionamientos"><i class="fas fa-parking"></i> {{ __('messages.parking') }}</a></li>
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
    <div class="section_color">
        <h1>{{ __('messages.welcome') }}</h1>
        <h2>{{ __('messages.parking_utn') }}</h2>

        <img src="imagenes/jaguar_inicio.jpg" class="img_inicio">
        <p>{{ __('messages.parking_description') }}</p>
        <br><br><br>
        <button class="btn">
            {{ __('messages.start_using') }}
        </button>
        <br><br>
    </div>
    

@endsection
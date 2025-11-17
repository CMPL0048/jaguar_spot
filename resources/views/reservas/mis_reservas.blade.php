@extends('plantilla')
@section('titulo', __('messages.my_reservas') . ' · Jaguar Spot')

@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/mis_reservas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('nav')
    <ul>
        <li><a href="/">{{ __('messages.home') }}</a></li>
        <li><a href="/estacionamientos">{{ __('messages.parking') }}</a></li>
        @auth
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-link"><i class="fa-solid fa-sign-out-alt"></i>
                        {{ __('messages.logout') }}</button>
                </form>
            </li>
        @endauth
    </ul>
@endsection

@section('contenido')

    <div class="reservas-container">
        <h1 class="titulo">📌 {{ __('messages.my_reservas') }}</h1>

        @if ($reservas->isEmpty())
            <p class="no-data">{{ __('messages.no_active_reservas') }}</p>
        @else
            <div class="reservas-grid">
                @foreach ($reservas as $reserva)
                    <div class="reserva-card {{ $reserva->estado }}">
                        <h3>{{ $reserva->puesto->estacionamiento->nombre ?? __('messages.unknown') }}</h3>

                        <div class="puesto-info">
                            <p><i class="fa-solid fa-square-parking"></i> {{ __('messages.spot') }}:
                                <strong>{{ $reserva->puesto->numero_puesto ?? 'N/A' }}</strong>
                            </p>

                            <!-- Etiqueta de tipo de puesto -->
                            <p class="puesto-tipo {{ $reserva->puesto->tipo }}">
                                {{ ucfirst($reserva->puesto->tipo) === 'Discapacitado' ? __('messages.disabled_spot') : __('messages.normal_spot') }}
                            </p>

                            <p class="estado estado-{{ $reserva->estado }}">
                                {{ ucfirst($reserva->estado) === 'Pendiente' ? __('messages.pending') : (ucfirst($reserva->estado) === 'Aceptado' ? __('messages.accepted') : __('messages.rejected')) }}
                            </p>
                        </div>

                        <!-- 📅 Fechas -->
                        <div class="fecha-info">
                            <p><i class="fa-regular fa-clock"></i> <strong>{{ __('messages.requested') }}:</strong>
                                {{ $reserva->created_at->format('d/m/Y H:i') }}</p>
                            @if ($reserva->estado === 'aceptado' && $reserva->hora_aprobacion)
                                <p><i class="fa-regular fa-calendar-check"></i>
                                    <strong>{{ __('messages.approved') }}:</strong>
                                    {{ \Carbon\Carbon::parse($reserva->hora_aprobacion)->format('d/m/Y H:i') }}
                                </p>
                            @endif
                        </div>

                        @if ($reserva->estado === 'pendiente')
                            <div class="qr-container">
                                {!! QrCode::size(200)->generate(url("/verificar-qr/{$reserva->codigo_qr}")) !!}
                                <p class="qr-link">
                                    <a href="{{ url("/verificar-qr/{$reserva->codigo_qr}") }}" target="_blank">
                                        <i class="fa-solid fa-qrcode"></i> {{ __('messages.view_qr') }}
                                    </a>
                                </p>
                            </div>
                        @elseif ($reserva->estado === 'rechazado')
                            <p class="mensaje-rechazo"><i class="fa-solid fa-circle-exclamation"></i>
                                {{ __('messages.reservation_rejected') }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection

@extends('plantilla')
@section('titulo', 'Mis Reservas · Jaguar Spot')

@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/mis_reservas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('nav')
    <ul>
        <li><a href="/"><span data-i18n="Inicio">Inicio</span></a></li>
        <li><a href="/estacionamientos"><span data-i18n="Estacionamientos">Estacionamientos</span></a></li>
        @auth
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-link"><i class="fa-solid fa-sign-out-alt"></i>
                        <span data-i18n="Cerrar Sesión">Cerrar Sesión</span></button>
                </form>
            </li>
        @endauth
    </ul>
@endsection

@section('contenido')

    <div class="reservas-container">
        <h1 class="titulo">📌 <span data-i18n="Mis Reservas">Mis Reservas</span></h1>

        @if ($reservas->isEmpty())
            <p class="no-data" data-i18n="No tienes reservas activas.">No tienes reservas activas.</p>
        @else
            <div class="reservas-grid">
                @foreach ($reservas as $reserva)
                    <div class="reserva-card {{ $reserva->estado }}">
                        <h3 data-i18n="{{ $reserva->puesto->estacionamiento->nombre ?? 'Desconocido' }}">{{ $reserva->puesto->estacionamiento->nombre ?? 'Desconocido' }}</h3>

                        <div class="puesto-info">
                            <p><i class="fa-solid fa-square-parking"></i> <span data-i18n="Puesto">Puesto</span>:
                                <strong>{{ $reserva->puesto->numero_puesto ?? 'N/A' }}</strong>
                            </p>

                            <!-- Etiqueta de tipo de puesto -->
                            <p class="puesto-tipo {{ $reserva->puesto->tipo }}">
                                @if (ucfirst($reserva->puesto->tipo) === 'Discapacitado')
                                    <span data-i18n="Puesto para Discapacitados">Puesto para Discapacitados</span>
                                @else
                                    <span data-i18n="Puesto Normal">Puesto Normal</span>
                                @endif
                            </p>

                            <p class="estado estado-{{ $reserva->estado }}">
                                @php
                                    $estado = ucfirst($reserva->estado);
                                @endphp
                                <span data-i18n="{{ $estado }}">{{ $estado }}</span>
                            </p>
                        </div>

                        <!-- 📅 Fechas -->
                        <div class="fecha-info">
                            <p><i class="fa-regular fa-clock"></i> <strong><span data-i18n="Solicitado">Solicitado</span>:</strong>
                                {{ $reserva->created_at->format('d/m/Y H:i') }}</p>
                            @if ($reserva->estado === 'aceptado' && $reserva->hora_aprobacion)
                                <p><i class="fa-regular fa-calendar-check"></i>
                                    <strong><span data-i18n="Aprobado">Aprobado</span>:</strong>
                                    {{ \Carbon\Carbon::parse($reserva->hora_aprobacion)->format('d/m/Y H:i') }}
                                </p>
                            @endif
                        </div>

                        @if ($reserva->estado === 'pendiente')
                            <div class="qr-container">
                                {!! QrCode::size(200)->generate(url("/verificar-qr/{$reserva->codigo_qr}")) !!}
                                <p class="qr-link">
                                    <a href="{{ url("/verificar-qr/{$reserva->codigo_qr}") }}" target="_blank">
                                        <i class="fa-solid fa-qrcode"></i> <span data-i18n="Ver código QR">Ver código QR</span>
                                    </a>
                                </p>
                            </div>
                        @elseif ($reserva->estado === 'rechazado')
                            <p class="mensaje-rechazo"><i class="fa-solid fa-circle-exclamation"></i>
                                <span data-i18n="Tu reserva ha sido rechazada.">Tu reserva ha sido rechazada.</span></p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection

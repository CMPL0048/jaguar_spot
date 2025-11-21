@extends('plantilla')
@section('titulo', 'Verificación de QR · Jaguar Spot')

@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/verificar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('contenido')

    <div class="verificacion-container">
        <h1 class="titulo" data-i18n="Verificación de QR">Verificación de QR</h1>

        @if ($reserva)
            <div class="reserva-info">
                <!-- Información del puesto -->
                <div
                    class="puesto-info {{ $reserva->puesto->tipo === 'discapacitado' ? 'puesto-discapacitado' : 'puesto-normal' }}">
                    <h2><span data-i18n="Puesto">Puesto</span> {{ $reserva->puesto->numero_puesto }}</h2>
                    <p class="puesto-tipo">
                        @if ($reserva->puesto->tipo === 'discapacitado')
                            <span data-i18n="Puesto para Discapacitados">Puesto para Discapacitados</span>
                        @else
                            <span data-i18n="Puesto Normal">Puesto Normal</span>
                        @endif
                    </p>
                </div>

                <!-- Información del usuario -->
                <div class="detalles-usuario">
                    <p><strong>👤 <span data-i18n="Usuario">Usuario</span>:</strong> {{ $reserva->usuario->nombre_completo }}</p>
                    <p><strong>🆔 <span data-i18n="Matrícula">Matrícula</span>:</strong> {{ $reserva->usuario->matricula }}</p>
                    <p><strong>⏳ <span data-i18n="Estado">Estado</span>:</strong> <span
                            class="estado-{{ $reserva->estado }}" data-i18n="{{ ucfirst($reserva->estado) }}">{{ ucfirst($reserva->estado) }}</span></p>
                    <p><strong>🕒 <span data-i18n="Hora de Solicitud">Hora de Solicitud</span>:</strong> {{ $reserva->hora_solicitud }}</p>
                </div>

                <!-- Botones de acción -->
                <div class="acciones">
                    <form action="{{ route('aprobar.reserva', $reserva->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">✅ <span data-i18n="Aprobar Reserva">Aprobar Reserva</span></button>
                    </form>

                    <form action="{{ route('rechazar.reserva', $reserva->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">❌ <span data-i18n="Rechazar Reserva">Rechazar Reserva</span></button>
                    </form>
                </div>
            </div>
        @else
            <p class="error-msg">❌ <span data-i18n="Código QR no encontrado">Código QR no encontrado</span></p>
        @endif
    </div>

@endsection

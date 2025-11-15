@extends('plantilla')
@section('titulo', 'Verificación de QR · Jaguar Spot')

@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/verificar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('contenido')

<div class="verificacion-container">
    <h1 class="titulo">Verificación de QR</h1>

    @if($reserva)
        <div class="reserva-info">
            <!-- Información del puesto -->
            <div class="puesto-info {{ $reserva->puesto->tipo === 'discapacitado' ? 'puesto-discapacitado' : 'puesto-normal' }}">
                <h2>Puesto {{ $reserva->puesto->numero_puesto }}</h2>
                <p class="puesto-tipo">{{ $reserva->puesto->tipo === 'discapacitado' ? '🟦 Puesto para Discapacitados' : '🟩 Puesto Normal' }}</p>
            </div>

            <!-- Información del usuario -->
            <div class="detalles-usuario">
                <p><strong>👤 Usuario:</strong> {{ $reserva->usuario->nombre_completo }}</p>
                <p><strong>🆔 Matrícula:</strong> {{ $reserva->usuario->matricula }}</p>
                <p><strong>⏳ Estado:</strong> <span class="estado-{{ $reserva->estado }}">{{ ucfirst($reserva->estado) }}</span></p>
                <p><strong>🕒 Hora de Solicitud:</strong> {{ $reserva->hora_solicitud }}</p>
            </div>

            <!-- Botones de acción -->
            <div class="acciones">
                <form action="{{ route('aprobar.reserva', $reserva->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">✅ Aprobar</button>
                </form>

                <form action="{{ route('rechazar.reserva', $reserva->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">❌ Rechazar</button>
                </form>
            </div>
        </div>
    @else
        <p class="error-msg">❌ No se encontró una reserva asociada a este código QR.</p>
    @endif
</div>

@endsection

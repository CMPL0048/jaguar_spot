@extends('plantilla')
@section('titulo', __('messages.qr_verification') . ' · Jaguar Spot')

@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/verificar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('contenido')

    <div class="verificacion-container">
        <h1 class="titulo">{{ __('messages.qr_verification') }}</h1>

        @if ($reserva)
            <div class="reserva-info">
                <!-- Información del puesto -->
                <div
                    class="puesto-info {{ $reserva->puesto->tipo === 'discapacitado' ? 'puesto-discapacitado' : 'puesto-normal' }}">
                    <h2>{{ __('messages.spot') }} {{ $reserva->puesto->numero_puesto }}</h2>
                    <p class="puesto-tipo">
                        {{ $reserva->puesto->tipo === 'discapacitado' ? __('messages.spot_for_disabled') : __('messages.normal_spot_tag') }}
                    </p>
                </div>

                <!-- Información del usuario -->
                <div class="detalles-usuario">
                    <p><strong>👤 {{ __('messages.user') }}:</strong> {{ $reserva->usuario->nombre_completo }}</p>
                    <p><strong>🆔 {{ __('messages.enrollment') }}:</strong> {{ $reserva->usuario->matricula }}</p>
                    <p><strong>⏳ {{ __('messages.state') }}:</strong> <span
                            class="estado-{{ $reserva->estado }}">{{ ucfirst($reserva->estado) }}</span></p>
                    <p><strong>🕒 {{ __('messages.request_time') }}:</strong> {{ $reserva->hora_solicitud }}</p>
                </div>

                <!-- Botones de acción -->
                <div class="acciones">
                    <form action="{{ route('aprobar.reserva', $reserva->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">✅ {{ __('messages.approve_button') }}</button>
                    </form>

                    <form action="{{ route('rechazar.reserva', $reserva->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">❌ {{ __('messages.reject_button') }}</button>
                    </form>
                </div>
            </div>
        @else
            <p class="error-msg">❌ {{ __('messages.qr_not_found') }}</p>
        @endif
    </div>

@endsection

@extends('plantilla')
@section('titulo', __('messages.login_title') . ' · Jaguar Spot')
@section('head')
    <link rel="stylesheet" href="estilos/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
@endsection

@section('nav')
    <ul>
        <li><a href="/"><i class="fas fa-home"></i> {{ __('messages.home') }}</a></li>
        <li><a href="/estacionamientos"><i class="fas fa-parking"></i> {{ __('messages.parking') }}</a></li>
        <li><a href="/ayuda"><i class="fas fa-question-circle"></i> {{ __('messages.help') }}</a></li>
    </ul>
@endsection

@section('contenido')
    <div class="section_color">
        <div class="login-image">
            <img src="{{ asset('imagenes/iconos/undraw_website_zbig.svg') }}" alt="{{ __('messages.login_title') }}">
        </div>

        <div class="login-content">
            <h1>{{ __('messages.login_title') }}</h1>
            <p class="section-subtitle">{{ __('messages.login_subtitle') }}</p>

            <form action="{{ route('login.post') }}" method="POST" class="formulario" novalidate>
                @csrf <div class="input-group">
                    <label for="usuario">{{ __('messages.username') }}</label>
                    <div class="input-wrapper"> <input type="text" name="usuario" id="usuario" class="text_field"
                            placeholder="{{ __('messages.enter_username') }}" required autocomplete="username">
                    </div>
                </div>

                <div class="input-group">
                    <label for="password">{{ __('messages.password') }}</label>
                    <div class="password-container">
                        <input type="password" name="password" class="text_field" id="password"
                            placeholder="{{ __('messages.enter_password') }}" required autocomplete="current-password">
                        <button type="button" class="toggle-password" onclick="togglePassword('password', 'eye-icon')"
                            aria-label="{{ __('messages.password') }}">
                            <i class="fa-solid fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                </div>

                <p id="small" style="text-align: center;">{{ __('messages.no_account') }} <a
                        href="/register">{{ __('messages.register_here') }}</a></p>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.enter') }}
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordField = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
@endsection

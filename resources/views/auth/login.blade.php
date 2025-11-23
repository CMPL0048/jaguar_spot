@extends('plantilla')
@section('titulo', 'Iniciar Sesión · Jaguar Spot')
@section('head')
    <link rel="stylesheet" href="estilos/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
@endsection

@section('nav')
    <ul>
        <li><a href="/"><i class="fas fa-home"></i> <span data-i18n="Inicio">Inicio</span></a></li>
        <li><a href="/estacionamientos"><i class="fas fa-parking"></i> <span data-i18n="Estacionamientos">Estacionamientos</span></a></li>
        <li><a href="/ayuda"><i class="fas fa-question-circle"></i> <span data-i18n="Ayuda">Ayuda</span></a></li>
    </ul>
@endsection

@section('contenido')
    <div class="section_color">
        <div class="login-image">
            <img src="{{ asset('imagenes/iconos/undraw_website_zbig.svg') }}" alt="Iniciar Sesión" data-i18n-alt="Iniciar Sesión">
        </div>

        <div class="login-content">
            <h1 data-i18n="Iniciar Sesión">Iniciar Sesión</h1>
            <p class="section-subtitle" data-i18n="Ingresa tus credenciales para acceder">Ingresa tus credenciales para acceder</p>

            <form action="{{ route('login.post') }}" method="POST" class="formulario" novalidate>
                @csrf <div class="input-group">
                    <label for="usuario" data-i18n="Nombre de Usuario">Nombre de Usuario</label>
                    <div class="input-wrapper"> <input type="text" name="usuario" id="usuario" class="text_field"
                            placeholder="Ingrese su usuario" data-i18n="Ingrese su usuario" required autocomplete="username">
                    </div>
                </div>

                <div class="input-group">
                    <label for="password" data-i18n="Contraseña">Contraseña</label>
                    <div class="password-container">
                        <input type="password" name="password" class="text_field" id="password"
                            placeholder="Ingrese su contraseña" data-i18n="Ingrese su contraseña" required autocomplete="current-password">
                        <button type="button" class="toggle-password" onclick="togglePassword('password', 'eye-icon')"
                            aria-label="Contraseña" data-i18n-aria-label="Contraseña">
                            <i class="fa-solid fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                </div>

                <p id="small" style="text-align: center;"><span data-i18n="¿Aún no tienes cuenta?">¿Aún no tienes cuenta?</span> <a
                        href="/register" data-i18n="Regístrate aquí">Regístrate aquí</a></p>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> <span data-i18n="Ingresar">Ingresar</span>
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

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.formulario');

            if (form) {
                form.addEventListener('submit', function(event) {
                    let isValid = true;
                    let firstErrorInput = null;
                    let errorCount = 0;

                    const inputs = form.querySelectorAll('input[required]');

                    inputs.forEach(input => {
                        if (!input.value.trim()) {
                            isValid = false;
                            errorCount++;
                            if (!firstErrorInput) firstErrorInput = input;
                            input.classList.add('invalid');
                        } else {
                            input.classList.remove('invalid');
                        }
                    });

                    if (!isValid) {
                        event.preventDefault();

                        const currentLang = localStorage.getItem('app_language') || 'es';
                        const dict = window.translations && window.translations[currentLang] ? window.translations[currentLang] : (window.translations ? window.translations['es'] : null);
                        const t = (key) => (dict && dict[key]) ? dict[key] : key;

                        let title = t('Atención');
                        let text = '';

                        if (errorCount > 1) {
                            text = t('Favor de rellenar los campos solicitados');
                        } else if (firstErrorInput) {
                            let fieldName = firstErrorInput.name;
                            const label = document.querySelector(`label[for="${firstErrorInput.id}"]`);
                            if (label) {
                                if (label.dataset.i18n) {
                                    fieldName = label.dataset.i18n;
                                } else {
                                    fieldName = label.innerText.trim();
                                }
                            }
                            const translatedFieldName = t(fieldName);
                            text = `${t('Por favor, completa el campo')}: ${translatedFieldName}`;
                        }

                        Swal.fire({
                            icon: 'warning',
                            title: title,
                            text: text,
                            confirmButtonColor: '#f39c12',
                            confirmButtonText: t('Aceptar')
                        });
                    }
                });

                // Limpiar error al escribir
                const inputs = form.querySelectorAll('input[required]');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        if (this.value.trim()) {
                            this.classList.remove('invalid');
                        }
                    });
                });
            }
        });
    </script>
@endsection

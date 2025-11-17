@extends('plantilla')
@section('titulo', __('messages.register_title') . ' · Jaguar Spot')
@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/signup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
@endsection

@section('nav')
    <ul>
        <li><a href="/"><i class="fas fa-home"></i> {{ __('messages.home') }}</a></li>
        <li><a href="/estacionamientos"><i class="fas fa-parking"></i> {{ __('messages.parking') }}</a></li>
        <li><a href="/ayuda"><i class="fas fa-question-circle"></i> {{ __('messages.help') }}</a></li>
        <li>@include('components.language-selector')</li>
    </ul>
@endsection

@section('contenido')

    {{-- Indicador de Progreso --}}
    <div class="progress-container">
        <div class="progress-bar-wrapper" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"
            aria-label="{{ __('messages.register_title') }}">
            <div class="progress-bar-fill" id="progressBar"></div>
        </div>

        <div class="steps-indicator">
            <div class="step-item active" data-step="1">
                <div class="step-circle" aria-label="{{ __('messages.step') }} 1">1</div>
                <div class="step-label">{{ __('messages.personal_data') }}</div>
            </div>
            <div class="step-item" data-step="2">
                <div class="step-circle" aria-label="{{ __('messages.step') }} 2">2</div>
                <div class="step-label">{{ __('messages.access_credentials') }}</div>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-circle" aria-label="{{ __('messages.step') }} 3">3</div>
                <div class="step-label">{{ __('messages.vehicles') }}</div>
            </div>
        </div>
    </div>

    <div class="section_color">
        <div class="login-image">
            <img src="{{ asset('imagenes/iconos/undraw_in-the-office_e7pg.svg') }}" alt="{{ __('messages.step1_title') }}"
                id="img-step-1" class="step-image active">
            <img src="{{ asset('imagenes/iconos/undraw_secure-login_m11a.svg') }}" alt="{{ __('messages.step2_title') }}"
                id="img-step-2" class="step-image">
            <img src="{{ asset('imagenes/iconos/undraw_vintage_q09n.svg') }}" alt="{{ __('messages.vehicles') }}"
                id="img-step-3" class="step-image">
        </div>

        <div class="login-content">
            <form action="{{ route('register.store') }}" method="POST" class="formulario" id="signupForm" novalidate>
                @csrf

                {{-- PASO 1: DATOS PERSONALES --}}
                <div class="form-step active" data-step="1">
                    <h1>{{ __('messages.step1_title') }}</h1>
                    <p class="section-subtitle">{{ __('messages.step1_subtitle') }}</p>

                    <div class="input-group">
                        <label for="nombre_completo">{{ __('messages.full_name') }}<span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="text" name="nombre_completo" id="nombre_completo" class="text_field"
                                placeholder="{{ __('messages.enter_full_name') }}" required autocomplete="name"
                                aria-describedby="nombre_completo-error" value="{{ old('nombre_completo') }}">
                            <i class="fas fa-check validation-icon success"></i>
                            <i class="fas fa-times validation-icon error"></i>
                        </div>
                        <span class="error-message"
                            id="nombre_completo-error">{{ __('messages.full_name_required') }}</span>
                    </div>

                    <div class="input-group">
                        <label for="usuario">{{ __('messages.username') }}<span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="text" name="usuario" id="usuario" class="text_field"
                                placeholder="{{ __('messages.enter_username') }}" required autocomplete="username"
                                aria-describedby="usuario-error usuario-help" value="{{ old('usuario') }}">
                            <i class="fas fa-check validation-icon success"></i>
                            <i class="fas fa-times validation-icon error"></i>
                        </div>
                        <span class="help-text" id="usuario-help">{{ __('messages.min_4_chars') }}</span>
                        <span class="error-message" id="usuario-error">{{ __('messages.user_required') }}</span>
                    </div>

                    <div class="input-group">
                        <label for="tipo_usuario">{{ __('messages.user_type') }}<span class="required">*</span></label>
                        <select name="tipo_usuario" id="tipo_usuario" class="text_field" required
                            aria-describedby="tipo_usuario-help">
                            <option value="">{{ __('messages.select_option') }}</option>
                            <option value="Alumno" {{ old('tipo_usuario') == 'Alumno' ? 'selected' : '' }}>
                                {{ __('messages.student') }}</option>
                            <option value="Docente" {{ old('tipo_usuario') == 'Docente' ? 'selected' : '' }}>
                                {{ __('messages.teacher') }}</option>
                            <option value="Discapacitado" {{ old('tipo_usuario') == 'Discapacitado' ? 'selected' : '' }}>
                                {{ __('messages.disabled') }}</option>
                            <option value="Invitado" {{ old('tipo_usuario') == 'Invitado' ? 'selected' : '' }}>
                                {{ __('messages.guest') }}</option>
                        </select>
                        <span class="help-text" id="tipo_usuario-help">{{ __('messages.select_best_describes') }}</span>
                    </div>

                    <div class="input-group" id="campo-identificador" style="display:none;">
                        <label id="label-identificador" for="identificador">{{ __('messages.identifier') }}<span
                                class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="text" name="identificador" id="identificador" class="text_field"
                                placeholder="" aria-describedby="identificador-error"
                                value="{{ old('identificador') }}">
                            <i class="fas fa-check validation-icon success"></i>
                            <i class="fas fa-times validation-icon error"></i>
                        </div>
                        <span class="error-message"
                            id="identificador-error">{{ __('messages.enrollment_required') }}</span>
                    </div>

                    <div class="input-group" id="campo-discapacitado-extra" style="display:none;">
                        <label for="tipo_discapacitado_extra">{{ __('messages.also_you') }}</label>
                        <select id="tipo_discapacitado_extra" name="tipo_discapacitado_extra" class="text_field">
                            <option value="">{{ __('messages.select_option') }}</option>
                            <option value="Alumno" {{ old('tipo_discapacitado_extra') == 'Alumno' ? 'selected' : '' }}>
                                {{ __('messages.student') }}</option>
                            <option value="Docente" {{ old('tipo_discapacitado_extra') == 'Docente' ? 'selected' : '' }}>
                                {{ __('messages.teacher') }}</option>
                            <option value="Invitado"
                                {{ old('tipo_discapacitado_extra') == 'Invitado' ? 'selected' : '' }}>
                                {{ __('messages.guest') }}</option>
                        </select>
                    </div>

                    <div class="form-navigation">
                        <button type="button" class="btn btn-primary" onclick="nextStep(1)">
                            {{ __('messages.next') }} <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- PASO 2: CREDENCIALES --}}
                <div class="form-step" data-step="2">
                    <h1>{{ __('messages.step2_title') }}</h1>
                    <p class="section-subtitle">{{ __('messages.step2_subtitle') }}</p>

                    <div class="input-group">
                        <label for="email">{{ __('messages.email') }}<span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="email" name="email" id="email" class="text_field"
                                placeholder="{{ __('messages.enter_email') }}" required autocomplete="email"
                                aria-describedby="email-error" value="{{ old('email') }}">
                            <i class="fas fa-check validation-icon success"></i>
                            <i class="fas fa-times validation-icon error"></i>
                        </div>
                        <span class="error-message" id="email-error">{{ __('messages.valid_email') }}</span>
                    </div>

                    <div class="input-group">
                        <label for="password">{{ __('messages.password') }}<span class="required">*</span></label>
                        <div class="password-container">
                            <input type="password" name="password" class="text_field" id="password"
                                placeholder="{{ __('messages.enter_password_min') }}" required
                                autocomplete="new-password" aria-describedby="password-error password-hint">
                            <button type="button" class="toggle-password" onclick="togglePassword()"
                                aria-label="{{ __('messages.password') }}">
                                <i class="fa-solid fa-eye" id="eye-icon"></i>
                            </button>
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="strengthBar"></div>
                        </div>
                        <span class="password-hint" id="password-hint">{{ __('messages.use_letters') }}</span>
                        <span class="error-message" id="password-error">{{ __('messages.password_min_8') }}</span>
                    </div>

                    <div class="input-group">
                        <label for="confirm-password">{{ __('messages.confirm_password') }}<span
                                class="required">*</span></label>
                        <div class="password-container">
                            <input type="password" name="password_confirmation" class="text_field" id="confirm-password"
                                placeholder="{{ __('messages.repeat_password') }}" required autocomplete="new-password"
                                aria-describedby="confirm-password-error">
                            <button type="button" class="toggle-password" onclick="toggleConfirmPassword()"
                                aria-label="{{ __('messages.confirm_password') }}">
                                <i class="fa-solid fa-eye" id="confirm-eye-icon"></i>
                            </button>
                            <i class="fas fa-check validation-icon success"></i>
                            <i class="fas fa-times validation-icon error"></i>
                        </div>
                        <span class="error-message"
                            id="confirm-password-error">{{ __('messages.passwords_not_match') }}</span>
                    </div>

                    <div class="form-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(2)">
                            <i class="fas fa-arrow-left"></i> {{ __('messages.prev') }}
                        </button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                            {{ __('messages.next') }} <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                {{-- PASO 3: VEHÍCULOS --}}
                <div class="form-step" data-step="3">
                    <h1>{{ __('messages.step3_title') }}</h1>
                    <p class="section-subtitle">{{ __('messages.step3_subtitle') }}</p>

                    <h2>{{ __('messages.your_vehicles') }}</h2>
                    <div id="vehiculos-container"></div>

                    <button type="button" id="agregar-vehiculo" class="btn">
                        <i class="fas fa-plus"></i> {{ __('messages.add_vehicle') }}
                    </button>

                    <div class="form-navigation">
                        <button type="button" class="btn btn-secondary" onclick="prevStep(3)">
                            <i class="fas fa-arrow-left"></i> {{ __('messages.prev') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i> {{ __('messages.register_button') }}
                        </button>
                    </div>

                </div>
            </form>

            <p id="small">{{ __('messages.have_account') }} <a href="/login">{{ __('messages.login_here') }}</a>
            </p>

        </div>
    </div>

    <script>
        // ============================================
        // NAVEGACIÓN ENTRE PASOS
        // ============================================
        let currentStep = 1;
        const totalSteps = 3;

        function updateProgressBar() {
            const progress = (currentStep / totalSteps) * 100;
            document.getElementById('progressBar').style.width = progress + '%';
            document.getElementById('progressBar').setAttribute('aria-valuenow', progress);
        }

        function updateStepIndicators() {
            document.querySelectorAll('.step-item').forEach((step, index) => {
                const stepNum = index + 1;
                step.classList.remove('active', 'completed');

                if (stepNum === currentStep) {
                    step.classList.add('active');
                } else if (stepNum < currentStep) {
                    step.classList.add('completed');
                    step.querySelector('.step-circle').innerHTML = '<i class="fas fa-check"></i>';
                } else {
                    step.querySelector('.step-circle').textContent = stepNum;
                }
            });
        }

        function showStep(step) {
            // ============================================
            // --- INICIO DE MODIFICACIÓN DE IMAGEN ---
            // 1. Ocultar todas las imágenes
            document.querySelectorAll('.step-image').forEach(img => img.classList.remove('active'));

            // 2. Mostrar la imagen del paso actual
            const targetImage = document.getElementById(`img-step-${step}`);
            if (targetImage) {
                targetImage.classList.add('active');
            }
            // --- FIN DE MODIFICACIÓN DE IMAGEN ---
            // ============================================

            // Tu código existente para mostrar el paso del formulario
            document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
            const targetStep = document.querySelector(`.form-step[data-step="${step}"]`);
            if (targetStep) {
                targetStep.classList.add('active');
            }

            updateProgressBar();
            updateStepIndicators();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function nextStep(step) {
            if (validateStep(step)) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep(step) {
            currentStep--;
            showStep(currentStep);
        }

        // ============================================
        // VALIDACIÓN EN TIEMPO REAL
        // ============================================
        function validateStep(step) {
            let isValid = true;
            const currentStepElement = document.querySelector(`.form-step[data-step="${step}"]`);

            if (!currentStepElement) {
                console.error('Step not found:', step);
                return false;
            }

            const inputs = currentStepElement.querySelectorAll('input[required], select[required]');

            inputs.forEach(input => {
                // Solo validar si el campo está visible (no oculto por display:none)
                if (input.offsetParent !== null) {
                    if (!validateInput(input)) {
                        isValid = false;
                    }
                }
            });

            return isValid;
        }

        function validateInput(input) {
            const value = input.value.trim();
            let isValid = true;

            // Validación básica de campos requeridos
            if (input.hasAttribute('required') && !value) {
                isValid = false;
            }

            // Validación específica por tipo
            if (input.type === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                isValid = emailRegex.test(value);
            }

            if (input.id === 'usuario' && value) {
                isValid = value.length >= 4;
            }

            if (input.id === 'password' && value) {
                isValid = value.length >= 8;
            }

            if (input.id === 'confirm-password' && value) {
                const password = document.getElementById('password').value;
                isValid = value === password;
            }

            // Aplicar clases de validación
            if (value && input.type !== 'password') {
                input.classList.toggle('valid', isValid);
                input.classList.toggle('invalid', !isValid);
            }

            return isValid;
        }

        // Event listeners para validación en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.text_field').forEach(input => {
                input.addEventListener('blur', function() {
                    // Solo validar si el campo está visible
                    if (this.offsetParent !== null) {
                        validateInput(this);
                    }
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('invalid')) {
                        validateInput(this);
                    }
                });
            });
        });

        // ============================================
        // TIPO DE USUARIO Y CAMPO DINÁMICO
        // ============================================
        const tipoUsuario = document.getElementById('tipo_usuario');
        const campoIdentificador = document.getElementById('campo-identificador');
        const labelIdentificador = document.getElementById('label-identificador');
        const identificador = document.getElementById('identificador');
        const campoDiscapacitadoExtra = document.getElementById('campo-discapacitado-extra');
        const tipoDiscapacitadoExtra = document.getElementById('tipo_discapacitado_extra');

        tipoUsuario.addEventListener('change', () => {
            campoIdentificador.style.display = 'none';
            campoDiscapacitadoExtra.style.display = 'none';
            identificador.required = false;
            identificador.value = '';
            identificador.classList.remove('valid', 'invalid');

            if (tipoUsuario.value === 'Alumno') {
                labelIdentificador.innerHTML = '{{ __('messages.enrollment') }}<span class="required">*</span>';
                identificador.placeholder = '{{ __('messages.enter_enrollment') }}';
                campoIdentificador.style.display = 'block';
                identificador.required = true;
            } else if (tipoUsuario.value === 'Docente') {
                labelIdentificador.innerHTML = '{{ __('messages.worker_code') }}<span class="required">*</span>';
                identificador.placeholder = '{{ __('messages.enter_worker_code') }}';
                campoIdentificador.style.display = 'block';
                identificador.required = true;
            } else if (tipoUsuario.value === 'Invitado') {
                labelIdentificador.innerHTML = '{{ __('messages.curp') }}<span class="required">*</span>';
                identificador.placeholder = '{{ __('messages.enter_curp') }}';
                campoIdentificador.style.display = 'block';
                identificador.required = true;
            } else if (tipoUsuario.value === 'Discapacitado') {
                campoDiscapacitadoExtra.style.display = 'block';
            }
        });

        tipoDiscapacitadoExtra.addEventListener('change', () => {
            if (tipoDiscapacitadoExtra.value === 'Alumno') {
                labelIdentificador.innerHTML = '{{ __('messages.enrollment') }}<span class="required">*</span>';
                identificador.placeholder = '{{ __('messages.enter_enrollment') }}';
                campoIdentificador.style.display = 'block';
                identificador.required = true;
            } else if (tipoDiscapacitadoExtra.value === 'Docente') {
                labelIdentificador.innerHTML = '{{ __('messages.worker_code') }}<span class="required">*</span>';
                identificador.placeholder = '{{ __('messages.enter_worker_code') }}';
                campoIdentificador.style.display = 'block';
                identificador.required = true;
            } else {
                campoIdentificador.style.display = 'none';
                identificador.required = false;
            }
        });

        // ============================================
        // CONTRASEÑAS
        // ============================================
        function togglePassword() {
            const field = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        function toggleConfirmPassword() {
            const field = document.getElementById('confirm-password');
            const icon = document.getElementById('confirm-eye-icon');
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Medidor de fuerza de contraseña
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('password-hint');

            let strength = 0;
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            strengthBar.className = 'password-strength-bar';

            if (strength === 0 || strength === 1) {
                strengthBar.classList.add('weak');
                strengthText.textContent = '{{ __('messages.weak_password') }}';
                strengthText.style.color = '#ff6b6b';
            } else if (strength === 2 || strength === 3) {
                strengthBar.classList.add('medium');
                strengthText.textContent = '{{ __('messages.medium_password') }}';
                strengthText.style.color = '#ffd93d';
            } else {
                strengthBar.classList.add('strong');
                strengthText.textContent = '{{ __('messages.strong_password') }}';
                strengthText.style.color = '#4caf50';
            }
        });

        // Validar coincidencia de contraseñas
        document.getElementById('confirm-password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;

            if (confirmPassword) {
                if (password === confirmPassword) {
                    this.classList.add('valid');
                    this.classList.remove('invalid');
                } else {
                    this.classList.add('invalid');
                    this.classList.remove('valid');
                }
            }
        });

        // ============================================
        // VEHÍCULOS DINÁMICOS
        // ============================================
        const contenedorVehiculos = document.getElementById('vehiculos-container');
        const btnAgregarVehiculo = document.getElementById('agregar-vehiculo');
        let vehiculoCount = 0;

        btnAgregarVehiculo.addEventListener('click', () => {
            vehiculoCount++;
            const html = `
    <div class="vehiculo" id="vehiculo-${vehiculoCount}">
        <h3>
            {{ __('messages.vehicles') }} ${vehiculoCount}
            <button type="button" class="remove-vehicle-btn" onclick="removeVehicle(${vehiculoCount})" aria-label="{{ __('messages.remove_vehicle') }} ${vehiculoCount}">
                <i class="fas fa-trash"></i> {{ __('messages.remove_vehicle') }}
            </button>
        </h3>
        <div class="vehicle-grid">
            <div class="input-group">
                <label for="marca-${vehiculoCount}">{{ __('messages.brand') }}<span class="required">*</span></label>
                <input type="text" name="vehiculos[${vehiculoCount}][marca]" id="marca-${vehiculoCount}" class="text_field" placeholder="{{ __('messages.enter_brand') }}" required>
            </div>
            <div class="input-group">
                <label for="modelo-${vehiculoCount}">{{ __('messages.model') }}<span class="required">*</span></label>
                <input type="text" name="vehiculos[${vehiculoCount}][modelo]" id="modelo-${vehiculoCount}" class="text_field" placeholder="{{ __('messages.enter_model') }}" required>
            </div>
            <div class="input-group">
                <label for="color-${vehiculoCount}">{{ __('messages.color') }}<span class="required">*</span></label>
                <input type="text" name="vehiculos[${vehiculoCount}][color]" id="color-${vehiculoCount}" class="text_field" placeholder="{{ __('messages.enter_color') }}" required>
            </div>
            <div class="input-group">
                <label for="placas-${vehiculoCount}">{{ __('messages.plates') }}<span class="required">*</span></label>
                <input type="text" name="vehiculos[${vehiculoCount}][placas]" id="placas-${vehiculoCount}" class="text_field" placeholder="{{ __('messages.enter_plates') }}" required>
            </div>
            <div class="input-group">
                <label for="anio-${vehiculoCount}">{{ __('messages.year') }}<span class="required">*</span></label>
                <input type="number" name="vehiculos[${vehiculoCount}][anio]" id="anio-${vehiculoCount}" class="text_field" min="1990" max="2025" placeholder="2020" required>
            </div>
            <div class="input-group">
                <label for="tipo-${vehiculoCount}">{{ __('messages.vehicle_type') }}<span class="required">*</span></label>
                <select name="vehiculos[${vehiculoCount}][tipo]" id="tipo-${vehiculoCount}" class="text_field" required>
                    <option value="">{{ __('messages.select_option') }}</option>
                    <option value="Auto">{{ __('messages.car') }}</option>
                    <option value="Motocicleta">{{ __('messages.motorcycle') }}</option>
                    <option value="Camioneta">{{ __('messages.truck') }}</option>
                </select>
            </div>
        </div>
    </div>`;
            contenedorVehiculos.insertAdjacentHTML('beforeend', html);
        });

        function removeVehicle(id) {
            const vehiculo = document.getElementById(`vehiculo-${id}`);
            if (vehiculo) {
                vehiculo.remove();
            }
        }


        // ============================================
        // INICIALIZACIÓN
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing...');
            updateProgressBar();
            updateStepIndicators();

            // Verificar que los pasos existen
            const steps = document.querySelectorAll('.form-step');
            console.log('Total steps found:', steps.length);

            // Si hay errores de validación de Laravel, mostrar el paso correspondiente
            @if ($errors->any())
                // Determinar qué paso mostrar basado en los errores
                @if ($errors->has('email') || $errors->has('password'))
                    currentStep = 2;
                    showStep(2);
                @endif
            @endif
        });
    </script>
@endsection

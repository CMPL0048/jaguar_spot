<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Reserva y gestiona tu lugar de estacionamiento en la Universidad Tecnológica de Nayarit con Jaguar Spot. Rápido, fácil y para toda la comunidad universitaria.">
    <link rel="stylesheet" href="{{ asset('estilos/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="icon" href="{!! asset('imagenes/logo.png') !!}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('titulo', 'Estacionamiento Jaguar')</title>
    @yield('head')
</head>

<body>
    <header>
        <div class="curved-green">
            <div class="contenedor">
                <nav>
                    <div class="logo-container">
                        <img src="{{ asset('imagenes/logo.png') }}" class="icon" alt="Jaguar Spot - Página principal">
                        <h1>Jaguar Spot</h1>
                    </div>
                    @yield('nav')
                    @if (config('translate.enabled'))
                        <div id="google_translate_element" style="display:inline-block; margin-left:1rem;"></div>
                    @endif
                </nav>
            </div>
            <svg xmlns="{{ asset('http://www.w3.org/2000/svg') }}" viewBox="0 0 1440 250">
                <path fill="#0d0e0d" fill-opacity="1"
                    d="M0,192L120,165.3C240,139,480,85,720,85.3C960,85,1200,139,1320,165.3L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
                </path>
            </svg>
        </div>
    </header>

    <div class="contenedor">
        @yield('contenido')
    </div>


    <footer>
        <div class="curved-green">
            <svg xmlns="{{ asset('http://www.w3.org/2000/svg') }}" viewBox="0 0 1440 319">
                <path fill="#0d0e0d" fill-opacity="1"
                    d="M0,160L120,170.7C240,181,480,203,720,197.3C960,192,1200,160,1320,144L1440,128L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z">
                </path>
            </svg>
        </div>
    </footer>
    @if (config('translate.enabled'))
        <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: '{{ config('translate.page_language', 'es') }}',
                    includedLanguages: '{{ config('translate.included_languages') }}',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
            }
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    @endif
</body>

</html>

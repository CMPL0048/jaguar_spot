@extends('plantilla')
@section('titulo', 'Panel de Administración · Jaguar Spot')
@section('head')
    <link rel="stylesheet" href="{{ asset('estilos/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('nav')
    <ul>
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
    <div class="dashboard-container">
        <h1 class="admin-title" data-i18n="Panel de Administración">Panel de Administración</h1>

        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const msg = "{{ session('success') }}";
                    const currentLang = localStorage.getItem('app_language') || 'es';
                    const dict = window.translations && window.translations[currentLang] ? window.translations[currentLang] : (window.translations ? window.translations['es'] : null);
                    const translatedMsg = (dict && dict[msg]) ? dict[msg] : msg;
                    const title = currentLang === 'en' ? 'Success' : 'Éxito';

                    Swal.fire({
                        icon: 'success',
                        title: title,
                        text: translatedMsg,
                        confirmButtonColor: '#28a745'
                    });
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const msg = "{{ session('error') }}";
                    const currentLang = localStorage.getItem('app_language') || 'es';
                    const dict = window.translations && window.translations[currentLang] ? window.translations[currentLang] : (window.translations ? window.translations['es'] : null);
                    const translatedMsg = (dict && dict[msg]) ? dict[msg] : msg;
                    const title = currentLang === 'en' ? 'Oops...' : 'Oops...';

                    Swal.fire({
                        icon: 'error',
                        title: title,
                        text: translatedMsg,
                        confirmButtonColor: '#d33'
                    });
                });
            </script>
        @endif

        <div id="dashboard-content">
            <p class="loading-text"><span data-i18n="Cargando">Cargando</span>...</p>
        </div>
    </div>

    <script>
        function loadDashboardData() {
            fetch("{{ route('admin.dashboard.data') }}")
                .then(response => response.json())
                .then(data => {
                    let html = `<div class="dashboard-sections">`;

                    // 🚧 Reservas Pendientes
                    html += `<div class="dashboard-section">
                            <h2>🚧 <span data-i18n="Reservas Pendientes">Reservas Pendientes</span></h2>`;

                    if (data.reservasPendientes.length === 0) {
                        html += `<p class="no-data" data-i18n="No hay reservas pendientes en este momento.">No hay reservas pendientes en este momento.</p>`;
                    } else {
                        data.reservasPendientes.forEach(estacionamiento => {
                            html += `<div class="card estacionamiento-card">
                                    <h3 data-i18n="${estacionamiento.nombre}">${estacionamiento.nombre}</h3>
                                    <div class="reservas-grid">`;

                            estacionamiento.puestos.forEach(puesto => {
                                if (puesto.reserva) {
                                    html += `<div class="card reserva-card">
                                            <p><span data-i18n="Puesto">Puesto</span>: <strong>${puesto.numero_puesto}</strong></p>
                                            <p><span data-i18n="Usuario">Usuario</span>: <strong>${puesto.reserva.usuario?.nombre_completo || 'N/A'}</strong></p>

                                            <div class="action-buttons">
                                                <form action="/admin/reservas/${puesto.reserva.id}/aprobar" method="POST">
                                                    @csrf
                                                    <button class="btn btn-aceptar" title="Aprobar" data-i18n-title="Aprobar"><i class="fa-solid fa-check"></i></button>
                                                </form>

                                                <form action="/admin/reservas/${puesto.reserva.id}/rechazar" method="POST">
                                                    @csrf
                                                    <button class="btn btn-rechazar" title="Rechazar" data-i18n-title="Rechazar"><i class="fa-solid fa-xmark"></i></button>
                                                </form>
                                            </div>
                                        </div>`;
                                }
                            });

                            html += `</div></div>`;
                        });
                    }

                    // ✅ Puestos Ocupados
                    html += `<div class="dashboard-section">
                        <h2>✅ <span data-i18n="Puestos Ocupados">Puestos Ocupados</span></h2>`;

                    if (data.puestosOcupados.length === 0) {
                        html += `<p class="no-data" data-i18n="No hay puestos ocupados en este momento.">No hay puestos ocupados en este momento.</p>`;
                    } else {
                        data.puestosOcupados.forEach(estacionamiento => {
                            html += `<div class="card estacionamiento-card">
                                <h3 data-i18n="${estacionamiento.nombre}">${estacionamiento.nombre}</h3>
                                <div class="puestos-grid">`;

                            estacionamiento.puestos.forEach(puesto => {
                                html += `<div class="card puesto-card occupied">
                                    <p><span data-i18n="Puesto">Puesto</span>: <strong>${puesto.numero_puesto}</strong></p>
                                    <form action="/admin/puestos/${puesto.id}/liberar" method="POST">
                                        @csrf
                                        <button class="btn btn-liberar" title="Liberar" data-i18n-title="Liberar"><i class="fa-solid fa-unlock"></i></button>
                                    </form>
                                </div>`;
                            });

                            html += `</div></div>`;
                        });
                    }

                    html += `</div>`; // Fin de dashboard-sections

                    document.getElementById("dashboard-content").innerHTML = html;

                    // Traducir el contenido cargado dinámicamente
                    const currentLang = localStorage.getItem('app_language') || 'es';
                    if (currentLang !== 'es' && typeof translatePageContent === 'function') {
                        translatePageContent(currentLang);
                    }
                })
                .catch(error => console.error("Error al cargar datos:", error));
        }

        setInterval(loadDashboardData, 5000);
        document.addEventListener("DOMContentLoaded", loadDashboardData);
    </script>

@endsection

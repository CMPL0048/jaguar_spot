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
                    <button type="submit" class="logout-link"><i class="fa-solid fa-sign-out-alt"></i> Cerrar Sesión</button>
                </form>
            </li>
        @endauth
    </ul>
@endsection

@section('contenido')
<div class="dashboard-container">
    <h1 class="admin-title">Panel de Administración</h1>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: "{{ session('success') }}",
                confirmButtonColor: '#28a745'
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    <div id="dashboard-content">
        <p class="loading-text">Cargando datos...</p> 
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
                            <h2>🚧 Reservas Pendientes</h2>`;

                if (data.reservasPendientes.length === 0) {
                    html += `<p class="no-data">No hay reservas pendientes en este momento.</p>`;
                } else {
                    data.reservasPendientes.forEach(estacionamiento => {
                        html += `<div class="card estacionamiento-card">
                                    <h3>${estacionamiento.nombre}</h3>
                                    <div class="reservas-grid">`;

                        estacionamiento.puestos.forEach(puesto => {
                            if (puesto.reserva) {
                                html += `<div class="card reserva-card">
                                            <p>Puesto: <strong>${puesto.numero_puesto}</strong></p>
                                            <p>Usuario: <strong>${puesto.reserva.usuario?.nombre_completo || 'N/A'}</strong></p>

                                            <div class="action-buttons">
                                                <form action="/admin/reservas/${puesto.reserva.id}/aprobar" method="POST">
                                                    @csrf
                                                    <button class="btn btn-aceptar"><i class="fa-solid fa-check"></i></button>
                                                </form>

                                                <form action="/admin/reservas/${puesto.reserva.id}/rechazar" method="POST">
                                                    @csrf
                                                    <button class="btn btn-rechazar"><i class="fa-solid fa-xmark"></i></button>
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
                        <h2>✅ Puestos Ocupados</h2>`;

            if (data.puestosOcupados.length === 0) {
                html += `<p class="no-data">No hay puestos ocupados en este momento.</p>`;
            } else {
                data.puestosOcupados.forEach(estacionamiento => {
                    html += `<div class="card estacionamiento-card">
                                <h3>${estacionamiento.nombre}</h3>
                                <div class="puestos-grid">`;

                    estacionamiento.puestos.forEach(puesto => {
                        html += `<div class="card puesto-card occupied">
                                    <p>Puesto: <strong>${puesto.numero_puesto}</strong></p>
                                    <form action="/admin/puestos/${puesto.id}/liberar" method="POST">
                                        @csrf
                                        <button class="btn btn-liberar"><i class="fa-solid fa-unlock"></i></button>
                                    </form>
                                </div>`;
                    });

                    html += `</div></div>`;
                });
            }

            html += `</div>`; // Fin de dashboard-sections

            document.getElementById("dashboard-content").innerHTML = html;
        })
        .catch(error => console.error("Error al cargar datos:", error));
    }

    setInterval(loadDashboardData, 5000);
    document.addEventListener("DOMContentLoaded", loadDashboardData);
</script>

@endsection

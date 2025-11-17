<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstacionamientoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('index');
})->name('inicio');

/*  ===========     RUTAS DE IDIOMA     ===========  */
Route::get('/set-language/{language}', [LanguageController::class, 'setLanguage'])->name('set.language');

/*  ===========     RUTAS LOGIN     ===========  */
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Mostrar formulario
Route::post('/login', [AuthController::class, 'login'])->name('login.post');   // Procesar login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');    // Cerrar sesión

/*  ===========     RUTAS REGISTER     ===========  */
Route::get('/register', [UserController::class, 'create'])->name('register'); // Mostrar formulario de registro
Route::post('/register', [UserController::class, 'store'])->name('register.store'); // Procesar registro

Route::get('/ayuda', function () {
    return view('ayuda');
})->name('ayuda');

/*  ===========     RUTAS ESTACIONAMIENTOS     ===========  */
Route::get('/estacionamientos', [EstacionamientoController::class, 'index'])->name('estacionamientos.index');
Route::get('/estacionamientos/{id}', [EstacionamientoController::class, 'show'])->name('estacionamientos.show');
Route::post('/puestos/reservar/{id}', [PuestoController::class, 'reservar'])->name('puestos.reservar');

/*  ===========     RUTAS PARA RESERVAS Y VERIFICACIÓN QR     ===========  */
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/verificar-qr/{codigo}', [ReservaController::class, 'verificarQR'])->name('verificar.qr');
    Route::post('/aprobar-reserva/{id}', [ReservaController::class, 'aprobarReserva'])->name('aprobar.reserva');
    Route::post('/rechazar-reserva/{id}', [ReservaController::class, 'rechazarReserva'])->name('rechazar.reserva');
});
Route::get('/mis-reservas', [ReservaController::class, 'misReservas'])->name('mis_reservas')->middleware('auth');

/*  ===========     RUTAS ADMIN     ===========  */
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/data', [AdminController::class, 'getDashboardData'])->name('admin.dashboard.data');
    Route::post('/admin/reservas/{id}/aprobar', [AdminController::class, 'aprobarReserva'])->name('admin.aprobar');
    Route::post('/admin/reservas/{id}/rechazar', [AdminController::class, 'rechazarReserva'])->name('admin.rechazar');
    Route::post('/admin/puestos/{id}/liberar', [AdminController::class, 'liberarPuesto'])->name('admin.liberar');
});

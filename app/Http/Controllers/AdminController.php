<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Puesto;
use App\Models\Estacionamiento;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function index() {
        // Obtener reservas pendientes agrupadas por estacionamiento
        $reservasPendientes = Estacionamiento::with(['puestos.reserva' => function ($query) {
            $query->where('estado', 'pendiente');
        }])->get();
    
        // Obtener los puestos ocupados FILTRANDO SOLO LOS QUE TIENEN UNA RESERVA ACTIVA
        $puestosOcupados = Estacionamiento::with(['puestos' => function ($query) {
            $query->whereHas('reserva', function ($reservaQuery) {
                $reservaQuery->where('estado', 'aceptado');
            });
        }])->get();
    
        return view('admin.dashboard', compact('reservasPendientes', 'puestosOcupados'));
    }
    public function aprobarReserva($id) {
        $reserva = Reserva::findOrFail($id);
        $reserva->update(['estado' => 'aceptado']);
        $reserva->puesto->update(['estado' => 'aceptado']);

        return back()->with('success', 'Reserva aprobada con éxito.');
    }

    public function rechazarReserva($id) {
        $reserva = Reserva::findOrFail($id); // Encontrar la reserva por ID
    
        if ($reserva) {
            // Primero actualizar el puesto a "disponible"
            $reserva->puesto->update(['estado' => 'disponible']);
    
            // Luego eliminar la reserva
            $reserva->delete();
        }
    
        return back()->with('error', 'Reserva rechazada y puesto liberado.');
    }
    

    public function liberarPuesto($id) {
        $puesto = Puesto::findOrFail($id);
    
        // Buscar la reserva asociada a este puesto
        $reserva = Reserva::where('puesto_id', $id)->where('estado', 'aceptado')->first();
    
        if ($reserva) {
            $reserva->delete(); // Eliminar la reserva asociada
        }
    
        // Cambiar el estado del puesto a "disponible"
        $puesto->update(['estado' => 'disponible']);
    
        return back()->with('success', 'Puesto liberado y reserva eliminada con éxito.');
    }

    public function getDashboardData() {
        // Obtener reservas pendientes con el usuario relacionado
        $reservasPendientes = Estacionamiento::with(['puestos.reserva' => function ($query) {
            $query->where('estado', 'pendiente');
        }, 'puestos.reserva.usuario'])->get();
    
        // Obtener los puestos ocupados asegurando que tienen una reserva aceptada
        $puestosOcupados = Estacionamiento::with(['puestos' => function ($query) {
            $query->whereHas('reserva', function ($reservaQuery) {
                $reservaQuery->where('estado', 'aceptado');
            });
        }, 'puestos.reserva.usuario'])->whereHas('puestos.reserva', function ($query) {
            $query->where('estado', 'aceptado');
        })->get();
    
        // Capturar el mensaje de éxito o error
        $successMessage = session('success');
        $errorMessage = session('error');
    
        return response()->json([
            'reservasPendientes' => $reservasPendientes,
            'puestosOcupados' => $puestosOcupados,
            'success' => $successMessage,
            'error' => $errorMessage
        ]);
    }
    

}

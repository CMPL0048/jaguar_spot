<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller {
    public function verificarQR($codigo) {
        $reserva = Reserva::where('codigo_qr', $codigo)->firstOrFail();
        return view('admin.verificar', compact('reserva'));
    }

    public function aprobarReserva($id) {
        $reserva = Reserva::findOrFail($id);
    
        dump($reserva); // Verifica qué datos tiene la reserva antes de actualizar
    
        // Cambiar el estado de la reserva a "aceptado"
        $reserva->update([
            'estado' => 'aceptado',
            'hora_aprobacion' => now()
        ]);
    
        dump($reserva->hora_aprobacion); // Verifica si se está actualizando
        dd($reserva);
    
        // Cambiar el estado del puesto a "ocupado"
        if ($reserva->puesto) {
            $reserva->puesto->update(['estado' => 'aceptado']);
        }
    
        return redirect()->route('admin.dashboard')->with('success', 'Reserva aprobada y puesto marcado como aceptado.');
    }
    

    public function rechazarReserva($id) {
        $reserva = Reserva::findOrFail($id);
    
        if ($reserva) {
            // Liberar el puesto
            $reserva->puesto->update(['estado' => 'disponible']);
    
            // Eliminar la reserva
            $reserva->delete();
        }
    
        return redirect()->route('admin.dashboard')->with('error', 'Reserva rechazada y puesto liberado.');
    }
    

    public function misReservas() {
        $usuario = auth()->user();
        
        // Obtener todas las reservas del usuario
        $reservas = $usuario->reservas()->with('puesto.estacionamiento')->orderBy('created_at', 'desc')->get();
    
        return view('reservas.mis_reservas', compact('reservas'));
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PuestoController extends Controller
{

    public function reservar($id)
    {
        $puesto = Puesto::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'Debes iniciar sesión para reservar un puesto.');
        }

        if ($puesto->estado !== 'disponible') {
            return back()->with('error', 'Este puesto ya está ocupado o en espera de aprobación.');
        }

        // Generar código QR único
        $codigo_qr = uniqid();

        // Crear la reserva
        $reserva = Reserva::create([
            'usuario_id' => $user->id,
            'puesto_id' => $puesto->id,
            'estado' => 'pendiente',
            'codigo_qr' => $codigo_qr
        ]);

        // Actualizar el estado del puesto a 'pendiente'
        $puesto->update(['estado' => 'pendiente']);

        // Redirigir al usuario a sus reservas en lugar de mostrar el QR
        return redirect()->route('mis_reservas')->with('success', 'Puesto reservado con éxito. Verifica en tu lista de reservas.');
    }

}

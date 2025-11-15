<?php

namespace App\Http\Controllers;

use App\Models\Estacionamiento;
use Illuminate\Http\Request;

class EstacionamientoController extends Controller {
    
    // Mostrar la lista de estacionamientos en el index
    public function index() {
        $estacionamientos = Estacionamiento::all();
        return view('estacionamientos.index', compact('estacionamientos'));
    }

    // Mostrar un solo estacionamiento con sus puestos
    public function show($id) {
        $estacionamiento = Estacionamiento::with('puestos')->findOrFail($id);
        $todosLosEstacionamientos = Estacionamiento::all(); // Renombramos para evitar conflictos
        return view('estacionamientos.show', compact('estacionamiento', 'todosLosEstacionamientos'));
    }
}
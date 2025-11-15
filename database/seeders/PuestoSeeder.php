<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estacionamiento;
use App\Models\Puesto;

class PuestoSeeder extends Seeder {
    public function run() {
        // Definir las capacidades y cantidad de puestos de discapacitados
        $config = [
            'Estacionamiento Rectoría' => ['total' => 103, 'discapacitados' => 4],
            'Estacionamiento Vinculación' => ['total' => 77, 'discapacitados' => 4],
            'Estacionamiento Turismo' => ['total' => 102, 'discapacitados' => 3],
            'Estacionamiento Gimnasio' => ['total' => 88, 'discapacitados' => 4],
        ];

        // Obtener los estacionamientos y asignarles puestos
        foreach ($config as $nombre => $data) {
            $estacionamiento = Estacionamiento::where('nombre', $nombre)->first();

            if ($estacionamiento) {
                for ($i = 1; $i <= $data['total']; $i++) {
                    // Determinar si el puesto es de discapacitados
                    $tipo = ($i <= $data['discapacitados']) ? 'discapacitado' : 'normal';

                    Puesto::create([
                        'estacionamiento_id' => $estacionamiento->id,
                        'numero_puesto' => $i,
                        'estado' => 'disponible', // Usamos estado en lugar de ocupado
                        'tipo' => $tipo
                    ]);
                }
            }
        }
    }
}



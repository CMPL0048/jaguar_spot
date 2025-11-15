<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estacionamiento;

class EstacionamientoSeeder extends Seeder {
    public function run() {
        Estacionamiento::insert([
            ['nombre' => 'Estacionamiento Vinculación', 'capacidad' => 77],
            ['nombre' => 'Estacionamiento Gimnasio', 'capacidad' => 88],
            ['nombre' => 'Estacionamiento Rectoria', 'capacidad' => 103],
            ['nombre' => 'Estacionamiento Turismo', 'capacidad' => 102],
        ]);
    }
}
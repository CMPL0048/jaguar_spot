<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('estacionamientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del estacionamiento
            $table->integer('capacidad'); // Total de puestos disponibles
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('estacionamientos');
    }
};


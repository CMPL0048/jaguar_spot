<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estacionamiento_id')->constrained()->onDelete('cascade'); // Relación con estacionamiento
            $table->integer('numero_puesto'); // Número del puesto dentro del estacionamiento
            $table->boolean('ocupado')->default(false); // Estado del puesto
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('puestos');
    }
};

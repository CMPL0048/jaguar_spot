<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('marca');
            $table->string('modelo');
            $table->string('color');
            $table->string('placas')->unique();
            $table->year('anio');
            $table->enum('tipo', ['Auto', 'Motocicleta', 'Camioneta']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vehiculos');
    }
};

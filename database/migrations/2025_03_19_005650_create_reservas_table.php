<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('puesto_id')->constrained('puestos')->onDelete('cascade');
            $table->enum('estado', ['pendiente', 'aceptado', 'rechazado'])->default('pendiente');
            $table->string('codigo_qr')->nullable(); // Se guardará el código QR generado
            $table->timestamp('hora_solicitud')->useCurrent();
            $table->timestamp('hora_aprobacion')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('reservas');
    }
};

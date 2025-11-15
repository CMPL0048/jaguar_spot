<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('puestos', function (Blueprint $table) {
            $table->enum('tipo', ['normal', 'discapacitado'])->default('normal')->after('numero_puesto');
            $table->enum('estado', ['disponible', 'pendiente', 'aceptado', 'rechazado'])->default('disponible')->after('tipo');
            $table->dropColumn('ocupado'); // Eliminamos el booleano
        });
    }

    public function down() {
        Schema::table('puestos', function (Blueprint $table) {
            $table->boolean('ocupado')->default(false);
            $table->dropColumn(['tipo', 'estado']);
        });
    }
};

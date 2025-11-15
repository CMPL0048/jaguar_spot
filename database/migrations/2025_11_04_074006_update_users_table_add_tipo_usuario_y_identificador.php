<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tipo_usuario')->after('usuario')->nullable();
            $table->string('identificador')->after('tipo_usuario')->nullable(); // matrícula / clave / CURP
            $table->string('tipo_discapacitado_extra')->nullable(); // si aplica
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['tipo_usuario', 'identificador', 'tipo_discapacitado_extra']);
        });
    }
};

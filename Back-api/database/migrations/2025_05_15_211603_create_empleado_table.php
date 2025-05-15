<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Apellido_p');
            $table->string('Apellido_m');
            $table->string('telefono');
            $table->string('puesto');      // Nuevo campo para el puesto del empleado
            $table->string('empresa');     // Nuevo campo para la empresa del empleado
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};

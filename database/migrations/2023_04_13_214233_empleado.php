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
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dni');
            $table->string('correo');
            $table->date('fecha_nacimiento');
            $table->string('area');
            $table->string('cargo');
            $table->string('local');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('tipo_contrato');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

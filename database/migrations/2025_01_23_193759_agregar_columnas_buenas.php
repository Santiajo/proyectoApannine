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
        Schema::table('colegios', function (Blueprint $table) {
            $table->string('colegioNombre', 30)->nullable();
            $table->string('colegioTelefono', 15)->nullable();
            $table->string('colegioCurso', 25)->nullable();
            $table->string('colegioProfJefe', 60)->nullable();
        });

        Schema::table('derivante', function (Blueprint $table) {
            $table->string('derivanteNombre', 60)->nullable();
            $table->string('derivanteObservaciones')->nullable();
        });

        Schema::table('familiar', function (Blueprint $table) {
            $table->integer('familiarRut')->nullable();
            $table->string('familiarDv', 1)->nullable();
            $table->string('familiarTelefono', 15)->nullable();
            $table->string('familiarCorreo', 55)->nullable();
        });

        Schema::table('antecedente_saluds', function (Blueprint $table) {
            $table->string('antSalNEE')->nullable();
            $table->string('antSalEnfCronica')->nullable();
            $table->string('antSalTratamiento')->nullable();
            $table->string('antSalDescCirugia')->nullable();
            $table->string('antSalFilePath')->nullable(); // Add this line
        });

        Schema::table('diagnostico', function (Blueprint $table) {
            $table->string('diagnosticoUsuario', 25)->nullable();
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

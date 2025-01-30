<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('colegios', function (Blueprint $table) {
            $table->dropColumn('colegioNombre');
            $table->dropColumn('colegioTelefono');
            $table->dropColumn('colegioCurso');
            $table->dropColumn('colegioProfJefe');
        });

        Schema::table('derivante', function (Blueprint $table) {
            $table->dropColumn('derivanteNombre');
            $table->dropColumn('derivanteObservaciones');
        });

        Schema::table('familiar', function (Blueprint $table) {
            $table->dropColumn('familiarRut');
            $table->dropColumn('familiarDv');
            $table->dropColumn('familiarTelefono');
            $table->dropColumn('familiarCorreo');
        });

        Schema::table('antecedente_saluds', function (Blueprint $table) {
            $table->dropColumn('antSalNEE');
            $table->dropColumn('antSalEnfCronica');
            $table->dropColumn('antSalTratamiento');
            $table->dropColumn('antSalDescCir');
            $table->dropColumn('antSalFilePath');
        });

        Schema::table('diagnostico', function (Blueprint $table) {
            $table->dropColumn('diagnosticoUsuario');
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

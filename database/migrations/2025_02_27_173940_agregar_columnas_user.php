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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('Usuarios')->default(false)->nullable();
            $table->boolean('Beneficiarios')->default(false)->nullable();
            $table->boolean('Especialistas')->default(false)->nullable();
            $table->boolean('Talleres')->default(false)->nullable();
            $table->boolean('Asistencia')->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('Usuarios');
            $table->dropColumn('Beneficiarios');
            $table->dropColumn('Especialistas');
            $table->dropColumn('Talleres');
            $table->dropColumn('Asistencia');
        });
    }
};

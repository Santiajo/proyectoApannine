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
            $table->boolean('usuarios')->default(false)->nullable();
            $table->boolean('beneficiarios')->default(false)->nullable();
            $table->boolean('especialistas')->default(false)->nullable();
            $table->boolean('talleres')->default(false)->nullable();
            $table->boolean('asistencias')->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'Usuarios')) {
                $table->dropColumn('Usuarios');
            }
            if (Schema::hasColumn('users', 'Beneficiarios')) {
                $table->dropColumn('Beneficiarios');
            }
            if (Schema::hasColumn('users', 'Especialistas')) {
                $table->dropColumn('Especialistas');
            }
            if (Schema::hasColumn('users', 'Talleres')) {
                $table->dropColumn('Talleres');
            }
            if (Schema::hasColumn('users', 'Asistencia')) {
                $table->dropColumn('Asistencia');
            }
        });
    }
};


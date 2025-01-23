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
        Schema::table('beneficiario', function (Blueprint $table) {
            $table->foreignId('derivante_id')->nullable()->constrained('derivante')->onDelete('set null');
            $table->foreignId('familiar_beneficiario_id')->nullable()->constrained('familiar_beneficiario')->onDelete('set null');
            $table->foreignId('antSal_id')->nullable()->constrained('antecedente_saluds')->onDelete('set null');
            $table->foreignId('antSoc_id')->nullable()->constrained('antecedente_socials')->onDelete('set null');
            $table->foreignId('diagnostico_id')->nullable()->constrained('colegios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beneficiario', function (Blueprint $table) {
            $table->dropForeign(['derivante_id']);
            $table->dropColumn('derivante_id');
            $table->dropForeign(['familiar_beneficiario_id']);
            $table->dropColumn('familiar_beneficiario_id');
            $table->dropForeign(['antSal_id']);
            $table->dropColumn('antSal_id');
            $table->dropForeign(['antSoc_id']);
            $table->dropColumn('antSoc_id');
            $table->dropForeign(['diagnostico_id']);
            $table->dropColumn('diagnostico_id');
        });
    }
};

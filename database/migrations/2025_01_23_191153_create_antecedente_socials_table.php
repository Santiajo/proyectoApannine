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
        Schema::create('antecedente_socials', function (Blueprint $table) {
            $table->id();
            $table->boolean('antSocFichaFamiliar');
            $table->string('antSocPtj')->nullable();
            $table->string('antSocBeneficio')->nullable();
            $table->boolean('antSocCredDiscapacidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedente_socials');
    }
};

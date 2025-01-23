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
        Schema::create('antecedente_saluds', function (Blueprint $table) {
            $table->id();
            $table->string('antSalNEE');
            $table->string('antSalEnfCronica');
            $table->string('antSalTratamiento');
            $table->boolean('antSalCirugia');
            $table->string('antSalDescCir');
            $table->string('antSalFilePath')->nullable(); // Add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedente_saluds');
    }
};

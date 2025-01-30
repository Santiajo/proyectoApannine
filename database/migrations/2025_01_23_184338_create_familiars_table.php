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
        Schema::create('familiar', function (Blueprint $table) {
            $table->id();
            $table->string('familiarParentesco', 25);
            $table->integer('familiarRut');
            $table->string('familiarDv', 1);
            $table->string('familiarPNombre', 20);
            $table->string('familiarSNombre', 20)->nullable();
            $table->string('familiarApPaterno', 20);
            $table->string('familiarTelefono', 15);
            $table->string('familiarCorreo', 5);
            $table->boolean('familiarCuidador');
            $table->string('familiarSitLaboral', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiar');
    }
};

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
        Schema::create('especialistas', function (Blueprint $table) {
            $table->id();
            $table->integer('especialistaRut');
            $table->char('especialistaDv', 1);
            $table->string('especialistaPNombre', 20);
            $table->string('especialistaSNombre', 20)->nullable();
            $table->string('especialistaApPaterno', 20);
            $table->string('especialistaApMaterno', 20);
            $table->char('especialistaTelefono', 9);
            $table->string('especialistaCorreo', 55);
            $table->timestamps();
            $table->foreignId('especialidad_id')->nullable()->constrained('especialidad')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialistas');
    }
};

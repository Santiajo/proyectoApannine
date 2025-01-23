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
        Schema::create('colegios', function (Blueprint $table) {
            $table->id();
            $table->boolean('colegioAsiste');
            $table->string('colegioNombre');
            $table->integer('colegioTelefono');
            $table->string('colegioCurso');
            $table->string('colegioProfJefe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colegios');
    }
};

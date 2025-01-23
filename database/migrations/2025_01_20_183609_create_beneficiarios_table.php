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
        Schema::create('beneficiario', function (Blueprint $table) {
            $table->id();
            $table->boolean('beneficiarioEstado')->default(true);
            $table->integer('beneficiarioRut');
            $table->char('beneficiarioDv', 1);
            $table->string('beneficiarioPNombre', 20);
            $table->string('beneficiarioSNombre', 20)->nullable();
            $table->string('beneficiarioApPaterno', 20);
            $table->string('beneficiarioApMaterno', 20);
            $table->date('beneficiarioFecNac');
            $table->char('beneficiarioTelefono', 9)->nullable();
            $table->string('beneficiarioDomicilio', 100);
            $table->string('beneficiarioTipDom', 100);
            $table->timestamps();
            $table->foreignId('cob_med_id')->nullable()->constrained('cob__medica')->onDelete('set null');
            $table->foreignId('nacionalidad_id')->nullable()->constrained('nacionalidad')->onDelete('set null');
            $table->foreignId('comuna_id')->nullable()->constrained('comuna')->onDelete('set null');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiario');
    }
};

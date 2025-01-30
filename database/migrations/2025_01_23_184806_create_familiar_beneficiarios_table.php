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
        Schema::create('familiar_beneficiario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiario_id')->nullable()->constrained('beneficiario')->onDelete('set null');
            $table->foreignId('familiar_id')->nullable()->constrained('familiar')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiar_beneficiario');
    }
};

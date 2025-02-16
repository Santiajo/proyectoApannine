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
        Schema::create('antSal_documento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('antSal_id')->nullable()->constrained('antecedente_saluds')->onDelete('set null');
            $table->foreignId('documento_id')->nullable()->constrained('documento')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antSal_documento');
    }
};

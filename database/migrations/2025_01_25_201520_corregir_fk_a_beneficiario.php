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
            $table->dropForeign(['diagnostico_id']);
            $table->dropColumn('diagnostico_id');

            $table->foreignId('diagnostico_id')->nullable()->constrained('diagnostico')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

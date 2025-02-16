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
        Schema::table('familiar', function (Blueprint $table) {
            $table->string('familiarApMaterno', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('familiar', function (Blueprint $table) {
            $table->dropColumn('familiarApMaterno');
        });
    }
};

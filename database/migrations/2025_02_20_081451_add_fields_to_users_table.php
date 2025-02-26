<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rut')->unique();
            $table->string('dv');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('telefono');
            $table->json('vistas')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'rut',
                'dv', 
                'primer_nombre', 
                'segundo_nombre', 
                'apellido_paterno', 
                'apellido_materno', 
                'telefono', 
                'vistas'
            ]);
        });
    }
};


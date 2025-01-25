<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diagnostico extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'diagnostico';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'diagnosticoUsuario',
        'diagnosticoDesc',
    ];

    // CREAMOS RELACIÓN CON EL MODELO ESPECIALISTA
    public function especialistas() {
        return $this->hasOne(Especialista::class);
    }
}

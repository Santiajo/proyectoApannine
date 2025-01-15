<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Especialista extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'especialista';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'especialistaRut',
        'especialistaDv',
        'especialistaPNombre',
        'especialistaSNombre',
        'especialistaApPaterno',
        'especialistaApMaterno',
        'especialistaTelefono',
        'especialistaCorreo',
        'especialidad_id',
    ];

    // CREAMOS RELACIÓN CON EL MODELO ESPECIALIDAD
    public function especialidad() {
        return $this->belongsTo(Especialidad::class);
    }
    // USAMOS EL MÉTODO belongsTo PARA INDICAR QUE UN ESPECIALISTA PERTENECE A UNA CATEGORÍA
}

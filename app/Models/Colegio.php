<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colegio extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'colegios';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'colegioAsiste',
        'colegioNombre',
        'colegioTelefono',
        'colegioCurso',
        'colegioProfJefe',
    ];

    // CREAMOS RELACIÓN CON EL MODELO ESPECIALISTA
    public function especialistas() {
        return $this->hasMany(Especialista::class);
    }
}

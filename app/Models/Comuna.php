<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comuna extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'comuna';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'nombreComuna',
    ];

    // CREAMOS RELACIÓN CON EL MODELO BENEFICIARIO
    public function beneficiario() {
        return $this->hasMany(Beneficiario::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class antecedenteSocial extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'antecedente_socials';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'antSocFichaFamiliar',
        'antSocPtj',
        'antSocBeneficio',
        'antSocCredDiscapacidad',
    ];

    // CREAMOS RELACIÓN CON EL MODELO ESPECIALISTA
    public function especialistas() {
        return $this->hasMany(Especialista::class);
    }
}

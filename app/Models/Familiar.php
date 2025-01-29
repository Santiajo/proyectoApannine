<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familiar extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'familiar';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'familiarParentesco',
        'familiarRut',
        'familiarDv',
        'familiarPNombre',
        'familiarSNombre',
        'familiarApPaterno',
        'familiarTelefono',
        'familiarCorreo',
        'familiarCuidador',
        'familiarSitLaboral'
    ];

    // Relación muchos a muchos con Beneficiarios
    public function beneficiarios()
    {
        return $this->belongsToMany(Beneficiario::class, 'familiarBeneficiario', 'familiar_id', 'beneficiario_id')
            ->withTimestamps();
    }
}

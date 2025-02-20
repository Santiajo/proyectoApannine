<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class antecedenteSalud extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'antecedente_saluds';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'antSalNEE',
        'antSalEnfCronica',
        'antSalTratamiento',
        'antSalCirugia',
        'antSalDescCirugia',
        'antSalFilePath',
    ];

    // CREAMOS RELACIÓN CON EL MODELO ESPECIALISTA
    public function especialistas() {
        return $this->hasMany(Especialista::class);
    }

    // RELACION PIVOTE CON DOCUMENTO
    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'antSal_documento', 'antSal_id', 'documento_id')->withTimestamps();
    }
}

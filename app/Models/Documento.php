<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documento extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'documento';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = ['antSalFilePath'];

    // RELACION PIVOTE CON ANTECEDENTE DE SALUD
    public function antecedentesSalud()
    {
        return $this->belongsToMany(AntecedenteSalud::class, 'antSal_documento', 'documento_id', 'antSal_id')->withTimestamps();
    }
}

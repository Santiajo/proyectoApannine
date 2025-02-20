<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class antSalDocumento extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'antsal_documento';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'antSal_id',
        'documento_id',
    ];

    public $timestamps = true;
}

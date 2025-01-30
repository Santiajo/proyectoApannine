<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class familiarBeneficiario extends Model
{
     // LLAMAMOS HasFactory PARA USARLO
     use HasFactory;

     // ASIGNAMOS EL NOMBRE DE LA TABLA
     protected $table = 'familiar_beneficiario';
 
     // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
     protected $fillable = [
         'beneficiario_id',
         'familiar_id',
     ];

     public $timestamps = true;
}

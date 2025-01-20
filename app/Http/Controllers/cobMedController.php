<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO COBERTURA MEDICA
use App\Models\Cob_Medica;

class cobMedController extends Controller
{
    // MÉTODO PARA MOSTRAR LA VISTA DEL CRUD 
    public function crudCobMedica()
    {
        $cobMedicas = Cob_Medica::all(); // LISTAR COBERTURAS MEDICAS
        return view('views.beneficiario.cobMedica.crudCobMedica', compact('cobMedicas'));
    }
}

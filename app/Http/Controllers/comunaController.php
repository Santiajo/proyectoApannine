<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO COMUNA
use App\Models\Comuna;

class comunaController extends Controller
{
    // MÉTODO PARA MOSTRAR LA VISTA DEL CRUD 
    public function crudComuna()
    {
        $comunas = Comuna::all(); // LISTAR COMUNAS
        return view('views.beneficiario.comuna.crudComuna', compact('comunas'));
    }
}

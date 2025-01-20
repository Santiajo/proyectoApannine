<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO ESPECIALIDAD
use App\Models\Nacionalidad;

class nacionalidadController extends Controller
{
    // MÉTODO PARA MOSTRAR LA VISTA DEL CRUD 
    public function crudNacionalidad()
    {
        $nacionalidades = Nacionalidad::all(); // LISTAR NACIONALIDADES
        return view('views.beneficiario.nacionalidad.crudNacionalidad', compact('nacionalidades'));
    }
}

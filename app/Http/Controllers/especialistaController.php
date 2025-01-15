<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO ESPECIALISTA
use App\Models\Especialista;

// IMPORTAR MODELO ESPECIALIDAD
use App\Models\Especialidad;

class especialistaController extends Controller
{
    // MÉTODO PARA MOSTRAR LA PÁGINA PRINCIPAL DEL CRUD
    public function listarEspecialistas()
    {
        $especialistas = Especialista::all(); // LISTAR ESPECIALISTAS
        $especialidades = Especialidad::all(); // LISTAR ESPECIALIDADES
        return view('views.especialistas.fichaEspecialista', compact('especialistas'), compact('especialidades'));
    }

    // MÉTODO PARA MOSTRAR EL FORMULARIO DE CREACIÓN DE ESPECIALISTA
    public function formularioEspecialista()
    {
        $especialidades = Especialidad::all(); // LISTAR ESPECIALIDADES
        return view('views.especialistas.formEspecialista', compact('especialidades'));
    }
}

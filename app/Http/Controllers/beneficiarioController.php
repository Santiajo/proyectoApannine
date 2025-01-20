<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO BENEFICIARIO
use App\Models\Beneficiario;
// IMPORTAR MODELO ESPECIALIDAD
use App\Models\Nacionalidad;
// IMPORTAR MODELO COMUNA
use App\Models\Comuna;
// IMPORTAR MODELO COBERTURA MEDICA
use App\Models\Cob_Medica;

class beneficiarioController extends Controller
{
    // MÉTODO PARA MOSTRAR LA PÁGINA PRINCIPAL DEL CRUD
    public function listarBeneficiarios()
    {
        $beneficiarios = Beneficiario::all(); // LISTAR BENEFICIARIOS 
        $nacionalidades = Nacionalidad::all(); // LISTAR NACIONALIDADES
        $comunas = Comuna::all(); // LISTAR COMUNAS
        $cobMedicas = Cob_Medica::all(); // LISTAR COBERTURAS MEDICAS
        return view('views.beneficiario.listarBeneficiarios', compact('beneficiarios', 'nacionalidades', 'comunas', 'cobMedicas'));
    }
}

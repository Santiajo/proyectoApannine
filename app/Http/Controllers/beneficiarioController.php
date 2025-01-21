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
        return view('views.beneficiario.listarBeneficiarios', compact('beneficiarios'));
    }

    // MÉTODO PARA MOSTRAR EL FORMULARIO DEL CRUD
    public function formularioBeneficiario()
    {
        $nacionalidades = Nacionalidad::all(); // LISTAR NACIONALIDADES
        $comunas = Comuna::all(); // LISTAR COMUNAS
        $cobMedicas = Cob_Medica::all(); // LISTAR COBERTURAS MEDICAS
        return view('views.beneficiario.formulario.formularioBeneficiario', compact('nacionalidades', 'comunas', 'cobMedicas'));
    }

    // MÉTODO PARA GUARDAR O ACTUALIZAR UN BENEFICIARIO
    public function guardarBeneficiario(Request $request)
    {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'benEstado' => 'required|digits:1|regex:/^[^<>]*$/',
            'benRut' => 'required|digits:8|regex:/^[0-9]+$/|unique:beneficiario,beneficiarioRut,' . $request->benId,
            'benDv' => 'required|string|max:1|regex:/^[0-9Kk]$/',
            'benPNombre' => 'required|string|max:20|regex:/^[^<>]*$/',
            'benSNombre' => 'nullable|string|max:20|regex:/^[^<>]*$/',
            'benApPaterno' => 'required|string|max:20|regex:/^[^<>]*$/',
            'benApMaterno' => 'required|string|max:20|regex:/^[^<>]*$/',
            'benFecNac' => 'required|date|before:today',
            'benTel' => 'required|string|min:7|max:15|regex:/^[0-9]+$/',
            'benCobMed' => 'required|digits_between:1,20|regex:/^[^<>]*$/',
            'benNac' => 'required|digits_between:1,20|regex:/^[^<>]*$/',
            'benDom' => 'required|string|max:100|regex:/^[^<>]*$/',
            'benComuna' => 'required|digits_between:1,20|regex:/^[^<>]*$/',
            'benTipViv' => 'required|string|max:20|regex:/^[^<>]*$/',
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA NACIONALIDAD, SINO, LA CREAMOS
        if ($request->benId) {
            $beneficiario = Beneficiario::findOrFail($request->benId);
            // ACTUALIZAR COMUNA EXISTENTE
            $beneficiario->update([
                'beneficiarioEstado' => $request->benEstado,
                'beneficiarioRut' => $request->benRut,
                'beneficiarioDv' => $request->benDv,
                'beneficiarioPNombre' => $request->benPNombre,
                'beneficiarioSNombre' => $request->benSNombre,
                'beneficiarioApPaterno' => $request->benApPaterno,
                'beneficiarioApMaterno' => $request->benApMaterno,
                'beneficiarioFecNac' => $request->benFecNac,
                'beneficiarioTelefono' => $request->benTel,
                'beneficiarioDomicilio' => $request->benDom,
                'beneficiarioTipDom' => $request->benTipViv,
                'cob_med_id' => $request->benCobMed,
                'nacionalidad_id' => $request->benNac,
                'comuna_id' => $request->benComuna,
            ]);
            return redirect()->route('beneficiarios.listarBeneficiarios')->with('success', 'Beneficiario actualizado correctamente.');
        } else {
            // CREAR NUEVA NACIONALIDAD
            Beneficiario::create([
                'beneficiarioEstado' => $request->benEstado,
                'beneficiarioRut' => $request->benRut,
                'beneficiarioDv' => $request->benDv,
                'beneficiarioPNombre' => $request->benPNombre,
                'beneficiarioSNombre' => $request->benSNombre,
                'beneficiarioApPaterno' => $request->benApPaterno,
                'beneficiarioApMaterno' => $request->benApMaterno,
                'beneficiarioFecNac' => $request->benFecNac,
                'beneficiarioTelefono' => $request->benTel,
                'beneficiarioDomicilio' => $request->benDom,
                'beneficiarioTipDom' => $request->benTipViv,
                'cob_med_id' => $request->benCobMed,
                'nacionalidad_id' => $request->benNac,
                'comuna_id' => $request->benComuna,
            ]);
            return redirect()->route('beneficiarios.listarBeneficiarios')->with('success', 'Beneficiario creado correctamente.');
        }
    }

    // MÉTODO PARA ELIMINAR UN BENEFICIARIO
    public function eliminarBeneficiario($id)
    {
        Beneficiario::findOrFail($id)->delete();
        return redirect()->route('beneficiarios.listarBeneficiarios')->with('success', 'Beneficiario eliminado correctamente.');
    }

    // MÉTODO PARA MOSTRAR LA FICHA DETALLADA DE UN BENEFICIARIO
    public function fichaBeneficiario($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $nacionalidades = Nacionalidad::all();
        $comunas = Comuna::all(); 
        $cobMedicas = Cob_Medica::all();
        return view('views.beneficiario.fichaBeneficiario', compact('beneficiario', 'nacionalidades', 'comunas', 'cobMedicas'));
    }

    // MÉTODO PARA MOSTRAR FORMULARIO BENEFICIARIO RELLENO
    public function formBenRelleno($id) 
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $nacionalidades = Nacionalidad::all();
        $comunas = Comuna::all(); 
        $cobMedicas = Cob_Medica::all();
        return view('views.beneficiario.formulario.formularioBeneficiario', compact('beneficiario','nacionalidades', 'comunas', 'cobMedicas'));
    }
}

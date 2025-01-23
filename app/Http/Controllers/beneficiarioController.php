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
// IMPORTAR MODELO COLEGIO
use App\Models\Colegio;
// IMPORTAR MODELO DERIVANTE
use App\Models\Derivante;

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
            'benAsisCol' => 'required|digits:1|regex:/^[^<>]*$/',
            'colNom' => 'nullable|string|max:30|regex:/^[^<>]*$/',
            'colTel' => 'nullable|string|min:7|max:15|regex:/^[0-9]+$/',
            'benCurso' => 'nullable|string|max:25|regex:/^[^<>]*$/',
            'colProfJefe' => 'nullable|string|max:60|regex:/^[^<>]*$/',
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA NACIONALIDAD, SINO, LA CREAMOS
        if ($request->benId) {
            $beneficiario = Beneficiario::findOrFail($request->benId);
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
            // OBTENER COLEGIO ASOCIADO AL BENEFICARIO 
            $colegio = Colegio::findOrFail($beneficiario->colegio_id);
            // ACTUALIZAR EL COLEGIO ASOCIADO
            $colegio->update([
                'colegioAsiste' => $request->benAsisCol,
                'colegioNombre' => $request->colNom,
                'colegioTelefono' => $request->colTel,
                'colegioCurso' => $request->benCurso,
                'colegioProfJefe' => $request->colProfJefe,
            ]);
            return redirect()->route('beneficiarios.listarBeneficiarios')->with('success', 'Beneficiario actualizado correctamente.');
        } else {
            // CREAR COLEGIO
            $colegio = Colegio::create([
                'colegioAsiste' => $request->benAsisCol,
                'colegioNombre' => $request->colNom,
                'colegioTelefono' => $request->colTel,
                'colegioCurso' => $request->benCurso,
                'colegioProfJefe' => $request->colProfJefe,
            ]);
            // CREAR BENEFICIARIO
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
                'colegio_id' => $colegio->id,
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
        $nacionalidad = Nacionalidad::findOrFail($beneficiario->nacionalidad_id);
        $comuna = Comuna::findOrFail($beneficiario->comuna_id);
        $cobMedica = Cob_Medica::findOrFail($beneficiario->cob_med_id);
        $colegio = Colegio::findOrFail($beneficiario->colegio_id);
        return view('views.beneficiario.fichaBeneficiario', compact('beneficiario', 'nacionalidad', 'comuna', 'cobMedica', 'colegio'));
    }

    // MÉTODO PARA MOSTRAR FORMULARIO BENEFICIARIO RELLENO
    public function formBenRelleno($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $nacionalidades = Nacionalidad::all();
        $comunas = Comuna::all();
        $cobMedicas = Cob_Medica::all();
        $colegio = Colegio::findOrFail($beneficiario->colegio_id);
        return view('views.beneficiario.formulario.formularioBeneficiario', compact('beneficiario', 'nacionalidades', 'comunas', 'cobMedicas', 'colegio'));
    }
}

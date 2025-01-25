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
// IMPORTAR MODELO ANTECEDENTES DE SALUD
use App\Models\antecedenteSalud;
// IMPORTAR MODELO ANTECEDENTES SOCIAL
use App\Models\antecedenteSocial;
// IMPORTAR MODELO ANTECEDENTES SOCIAL
use App\Models\Diagnostico;

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
            'benRut' => 'required|digits_between:7,8|regex:/^[0-9]+$/|unique:beneficiario,beneficiarioRut,' . $request->benId,
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
            'devNombre' => 'nullable|string|max:60|regex:/^[^<>]*$/',
            'devObservaciones' => 'nullable|string|regex:/^[^<>]*$/',
            'benNee' => 'nullable|string|regex:/^[^<>]*$/',
            'benEnfCro' => 'nullable|string|regex:/^[^<>]*$/',
            'benTratamientos' => 'nullable|string|regex:/^[^<>]*$/',
            'benCirugia' => 'required|digits:1|regex:/^[^<>]*$/',
            'benCirugiaNom' => 'nullable|string|regex:/^[^<>]*$/',
            'benFicFam' => 'required|digits:1|regex:/^[^<>]*$/',
            'benFicFamPtje' => 'nullable|string|max:40|regex:/^[^<>]*$/',
            'benCredDisc' => 'required|digits:1|regex:/^[^<>]*$/',
            'benDiag' => 'required|string|regex:/^[^<>]*$/',
        ]);
        // OBTENER LOS BENEFICIOS SOCIALES
        $beneficios = $request->input('benBenSoc', []);
        $beneficioExtra = $request->input('benBenSocOtro', null);
        // SI HAY BENEFICIOS EXTRA, SE AÑADE A LA LISTA
        if ($beneficioExtra) {
            // Agregar el beneficio extra al array si existe
            $beneficios[] = $beneficioExtra;
        }
        // UNIFICAR BENEFICIOS
        $beneficiosGuardados = implode(', ', $beneficios);

        // MANEJO DE SUBIDA DE ARCHIVOS
        if ($request->hasFile('benEvidMed')) {
            $filePath = $request->file('benEvidMed')->storeAs(
                'public/beneficiarios',
                $request->file('benEvidMed')->getClientOriginalName(),
                'public'
            );
        }

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
            // OBTENER DERIVANTE ASOCIADO AL BENEFICIARIO
            $derivante = Derivante::findOrFail($beneficiario->derivante_id);
            // ACTUALIZAR DERIVANTE
            $derivante->update([
                'derivanteNombre' => $request->devNombre,
                'derivanteObservaciones' => $request->devObservaciones,
            ]);
            // OBTENER ANTECEDENTES DE SALUD PERTINENTES
            $antSalud = antecedenteSalud::findOrFail($beneficiario->antSal_id);
            // ACTUALIZAR ANTECEDENTES MEDICOS
            $antSalud->update([
                'antSalNEE' => $request->benNee,
                'antSalEnfCronica' => $request->benEnfCro,
                'antSalTratamiento' => $request->benTratamientos,
                'antSalCirugia' => $request->benCirugia,
                'antSalDescCirugia' => $request->benCirugiaNom,
                'antSalFilePath' => $request->benEvidMed,
            ]);
            // OBTENER ANTECEDENTES DE SALUD PERTINENTES
            $antSocial = antecedenteSocial::findOrFail($beneficiario->antSoc_id);
            // ACTUALIZAR ANTECEDENTES MEDICOS
            $antSocial->update([
                'antSocFichaFamiliar' => $request->benFicFam,
                'antSocPtj' => $request->benFicFamPtje,
                'antSocBeneficio' => $beneficiosGuardados,
                'antSocCredDiscapacidad' => $request->benCredDisc,
            ]);
            // OBTENER ANTECEDENTES DE SALUD PERTINENTES
            $diagnostico = Diagnostico::findOrFail($beneficiario->diagnostico_id);
            // ACTUALIZAR ANTECEDENTES MEDICOS
            $diagnostico->update([
                'diagnosticoDesc' => $request->benDiag,
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
            // CREAR DERIVANTE
            $derivante = Derivante::create([
                'derivanteNombre' => $request->devNombre,
                'derivanteObservaciones' => $request->devObservaciones,
            ]);
            // CREAR ANTECEDENTES DE SALUD
            $antSalud = antecedenteSalud::create([
                'antSalNEE' => $request->benNee,
                'antSalEnfCronica' => $request->benEnfCro,
                'antSalTratamiento' => $request->benTratamientos,
                'antSalCirugia' => $request->benCirugia,
                'antSalDescCirugia' => $request->benCirugiaNom,
                'antSalFilePath' => $filePath,
            ]);
            // CREAR ANTECEDENTES SOCIALES
            $antSocial = antecedenteSocial::create([
                'antSocFichaFamiliar' => $request->benFicFam,
                'antSocPtj' => $request->benFicFamPtje,
                'antSocBeneficio' => $beneficiosGuardados,
                'antSocCredDiscapacidad' => $request->benCredDisc,
            ]);
            // CREAR DIAGNOSTICO
            $diagnostico = Diagnostico::create([
                'diagnosticoDesc' => $request->benDiag,
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
                'derivante_id' => $derivante->id,
                'antSal_id' => $antSalud->id,
                'antSoc_id' => $antSocial->id,
                'diagnostico_id' => $diagnostico->id,
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

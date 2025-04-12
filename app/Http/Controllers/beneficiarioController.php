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
// IMPORTAR MODELO FAMILIAR
use App\Models\Familiar;
// IMPORTAR MODELO ANTECEDENTES DE SALUD
use App\Models\antecedenteSalud;
// IMPORTAR MODELO ANTECEDENTES SOCIAL
use App\Models\antecedenteSocial;
// IMPORTAR MODELO ANTECEDENTES SOCIAL
use App\Models\Diagnostico;
// IMPORTAR MODELO DOCUMENTO
use App\Models\Documento;

// PARA EXPORTAR A EXCEL
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BeneficiariosExport;

class beneficiarioController extends Controller
{
    // MÉTODO PARA MOSTRAR LA PÁGINA PRINCIPAL DEL CRUD
    public function listarBeneficiarios(Request $request) {
        $search = $request->input('benBuscar');
        $request->validate([
            'benBuscar' => 'nullable|string|max:30|regex:/^[^<>]*$/',
        ]);

        $itemsPerPage = $request->input('items_per_page', 10);

        $beneficiarios = Beneficiario::query()
            ->when($search, function ($query) use ($search) {
                $query->where('beneficiarioPNombre', 'LIKE', "%{$search}%")
                    ->orWhere('beneficiarioApPaterno', 'LIKE', "%{$search}%")
                    ->orWhere('beneficiarioRut', 'LIKE', "%{$search}%");
            })
            ->with('familiarCuidador')
            ->paginate($itemsPerPage)
            ->withQueryString();

        return view('beneficiario.listarBeneficiarios', compact('beneficiarios', 'search', 'itemsPerPage'));
    }

    // MÉTODO PARA MOSTRAR EL FORMULARIO DEL CRUD
    public function formularioBeneficiario()
    {
        $nacionalidades = Nacionalidad::all(); // LISTAR NACIONALIDADES
        $comunas = Comuna::all(); // LISTAR COMUNAS
        $cobMedicas = Cob_Medica::all(); // LISTAR COBERTURAS MEDICAS
        return view('beneficiario.formulario.formularioBeneficiario', compact('nacionalidades', 'comunas', 'cobMedicas'));
    }

    // MÉTODO PARA VALIDAR BOOLEANOS
    public function validarBoolean(Request $request, $nombreBoolean)
    {
        $request->validate([
            $nombreBoolean => 'required|boolean',
        ]);
    }

    // MÉTODO PARA VALIDAR STRINGS
    public function validarString(Request $request, $nombreString, $necesariedad, int $largoString)
    {
        $request->validate([
            $nombreString => $necesariedad . '|string|max:' . $largoString . '|regex:/^[^<>]*$/',
        ]);
    }

    // MÉTODO PARA VALIDAR INTEGERS
    public function validarInteger(Request $request, $nombreInteger)
    {
        $request->validate([
            $nombreInteger => 'required|digits_between:1,20|regex:/^[^<>]*$/',
        ]);
    }

    // REGLAS PARA NÚMEROS DE TELEFONO
    public function reglaTelefonos($nullable = true)
    {
        return ($nullable ? 'nullable' : 'required') . '|string|min:7|max:15|regex:/^[0-9]+$/';
    }

    // MÉTODO PARA VALIDAR DATOS DEL FORMULARIO
    public function validarFormulario(Request $request)
    {
        // VALIDAR TODOS LOS BOOLEANOS DEL FORMULARIO
        $booleanos = ['benEstado', 'benAsisCol', 'benCirugia', 'benFicFam', 'benCredDisc'];
        foreach ($booleanos as $boolean) {
            $this->validarBoolean($request, $boolean);
        }

        // VALIDAR STRINGS PEQUEÑOS
        $stringPequenios = ['benPNombre', 'benApPaterno', 'benApMaterno', 'benTipViv'];
        foreach ($stringPequenios as $stringPequenio) {
            $this->validarString($request, $stringPequenio, 'required', 20);
        }
        $this->validarString($request, 'benSNombre', 'nullable', 20);
        $this->validarString($request, 'benCurso', 'nullable', 25);
        $this->validarString($request, 'colNom', 'nullable', 30);
        $this->validarString($request, 'benFicFamPtje', 'nullable', 40);
        // VALIDAR STRINGS MEDIANOS
        $this->validarString($request, 'colProfJefe', 'nullable', 60);
        $this->validarString($request, 'devNombre', 'nullable', 60);
        $this->validarString($request, 'benDom', 'required', 100);
        // VALIDAR STRINGS GRANDES
        $stringGrandes = ['devObservaciones', 'benNee', 'benEnfCro', 'benTratamientos', 'benCirugiaNom'];
        foreach ($stringGrandes as $stringGrande) {
            $this->validarString($request, $stringGrande, 'nullable', 255);
        }
        $this->validarString($request, 'benDiag', 'required', 255);

        // VALIDAR INTEGERS
        $integers = ['benCobMed', 'benNac', 'benComuna'];
        foreach ($integers as $integer) {
            $this->validarInteger($request, $integer);
        }

        // VALIDAR CAMPOS ESPECIALES
        $request->validate([
            'benRut' => 'required|digits_between:7,8|regex:/^[0-9]+$/|unique:beneficiario,beneficiarioRut,' . $request->benId,
            'benDv' => 'required|string|max:1|regex:/^[0-9Kk]$/',
            'benTel' => $this->reglaTelefonos(),
            'colTel' => $this->reglaTelefonos(),
            'benFecNac' => 'required|date|before:today',
        ]);
    }

    // MÉTODO PARA CREAR REGISTROS
    public function crearRegistro(Request $request, $nombreModelo, $listaColumnas, $listaCampos)
    {
        $datos = [];
        for ($i = 0; $i < count($listaColumnas); $i++) {
            if (isset($listaCampos[$i])) {
                $datos[$listaColumnas[$i]] = is_string($listaCampos[$i])
                    ? $request->input($listaCampos[$i])
                    : $listaCampos[$i];
            }
        }
        return $nombreModelo::create($datos);
    }

    // MÉTODO PARA GUARDAR LOS FAMILIARES DE UN BENEFICIARIO
    public function guardarFamiliares(Request $request, $beneficiario_id)
    {
        $familiares = $request->input('familiares');

        foreach ($familiares as $familiar) {
            $nuevoFamiliar = Familiar::create([
                'familiarParentesco' => $familiar['famTipo'],
                'familiarRut' => $familiar['famRut'],
                'familiarDv' => $familiar['famDv'],
                'familiarPNombre' => $familiar['famPNombre'],
                'familiarSNombre' => $familiar['famSNombre'],
                'familiarApPaterno' => $familiar['famApPaterno'],
                'familiarApMaterno' => $familiar['famApMaterno'],
                'familiarTelefono' => $familiar['famTel'],
                'familiarCorreo' => $familiar['famEmail'],
                'familiarCuidador' => $familiar['famCuidador'] ?? 0,
                'familiarSitLaboral' => $familiar['famSitLab'],
            ]);
            $nuevoFamiliar->beneficiarios()->attach($beneficiario_id);
        }
    }

    // MÉTODO PARA GUARDAR MÚLTIPLES ARCHIVOS
    public function guardarArchivos(Request $request)
    {
        $antSalud = AntecedenteSalud::create([
            'antSalNEE' => $request->benNee,
            'antSalEnfCronica' => $request->benEnfCro,
            'antSalTratamiento' => $request->benTratamientos,
            'antSalCirugia' => $request->benCirugia,
            'antSalDescCirugia' => $request->benCirugiaNom,
        ]);

        $files = $request->file('benEvidMed');
        if ($files) {
            foreach ($files as $file) {
                if ($file->isValid()) { // Verifica que el archivo no tenga errores
                    $timestamp = now()->format('Ymd_His');
                    $uniqueName = $timestamp . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('beneficiarios', $uniqueName, 'public');

                    $documento = Documento::create([
                        'antSalFilePath' => $filePath
                    ]);

                    $antSalud->documentos()->attach($documento->id);
                }
            }
        }
        return $antSalud;
    }

    // MÉTODO PARA GUARDAR O ACTUALIZAR UN BENEFICIARIO
    public function guardarBeneficiario(Request $request)
    {
        // VALIDAR INFORMACIÓN DEL FORMULARIO
        $this->validarFormulario($request);

        // MANEJO DE MÚLTIPLES BENEFICIOS TOTALES
        $beneficios = $request->input('benBenSoc', []);
        $beneficioExtra = $request->input('benBenSocOtro', null);
        // SI HAY BENEFICIOS EXTRA, SE AÑADE A LA LISTA
        if ($beneficioExtra) {
            // Agregar el beneficio extra al array si existe
            $beneficios[] = $beneficioExtra;
        }
        // UNIFICAR BENEFICIOS
        $beneficiosGuardados = implode(', ', $beneficios);

        // Obtener familiares:
        $familiares = $request->input('familiares');

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA NACIONALIDAD, SINO, LA CREAMOS
        if ($request->benId) {
            foreach ($familiares as $familiar) {
                $familiarExistente = Familiar::find($familiar['famId']);
                if ($familiarExistente) {
                    $familiarExistente->update([
                        'familiarParentesco' => $familiar['famTipo'],
                        'familiarRut' => $familiar['famRut'],
                        'familiarDv' => $familiar['famDv'],
                        'familiarPNombre' => $familiar['famPNombre'],
                        'familiarSNombre' => $familiar['famSNombre'],
                        'familiarApPaterno' => $familiar['famApPaterno'],
                        'familiarApMaterno' => $familiar['famApMaterno'],
                        'familiarTelefono' => $familiar['famTel'],
                        'familiarCorreo' => $familiar['famEmail'],
                        'familiarCuidador' => $familiar['famCuidador'] ?? 0,
                        'familiarSitLaboral' => $familiar['famSitLab'],
                    ]);
                }
            }
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
            // OBTENER DIAGNOSTICO PERTINENTE
            $diagnostico = Diagnostico::findOrFail($beneficiario->diagnostico_id);
            // ACTUALIZAR DIAGNOSTICO
            $diagnostico->update([
                'diagnosticoDesc' => $request->benDiag,
            ]);
            return redirect()->route('beneficiarios.listarBeneficiarios')->with('success', 'Beneficiario actualizado correctamente.');
        } else {
            // CREAR COLEGIO
            $colegioColumnas = ['colegioAsiste', 'colegioNombre', 'colegioTelefono', 'colegioCurso', 'colegioProfJefe'];
            $colegioCampos = ['benAsisCol', 'colNom', 'colTel', 'benCurso', 'colProfJefe'];
            $colegio = $this->crearRegistro($request, Colegio::class, $colegioColumnas, $colegioCampos);
            // CREAR DERIVANTE
            $derivanteColumnas = ['derivanteNombre', 'derivanteObservaciones'];
            $derivanteCampos = ['devNombre', 'devObservaciones'];
            $derivante = $this->crearRegistro($request, Derivante::class, $derivanteColumnas, $derivanteCampos);
            // CREAR ANTECEDENTES DE SALUD Y GUARDAR ARCHIVOS
            $antSalud = $this->guardarArchivos($request);
            // CREAR ANTECEDENTES SOCIALES
            $antSocial = antecedenteSocial::create([
                'antSocFichaFamiliar' => $request->benFicFam,
                'antSocPtj' => $request->benFicFamPtje,
                'antSocBeneficio' => $beneficiosGuardados,
                'antSocCredDiscapacidad' => $request->benCredDisc,
            ]);
            // CREAR DIAGNOSTICO
            $diagnosticoColumnas = ['diagnosticoDesc'];
            $diagnosticoCampos = ['benDiag'];
            $diagnostico = $this->crearRegistro($request, Diagnostico::class, $diagnosticoColumnas, $diagnosticoCampos);
            // CREAR BENEFICIARIO
            $beneficiarioColumnas = [
                'beneficiarioEstado',
                'beneficiarioRut',
                'beneficiarioDv',
                'beneficiarioPNombre',
                'beneficiarioSNombre',
                'beneficiarioApPaterno',
                'beneficiarioApMaterno',
                'beneficiarioFecNac',
                'beneficiarioTelefono',
                'beneficiarioDomicilio',
                'beneficiarioTipDom',
                'cob_med_id',
                'nacionalidad_id',
                'comuna_id',
                'colegio_id',
                'derivante_id',
                'antSal_id',
                'antSoc_id',
                'diagnostico_id'
            ];
            $beneficiarioCampos = [
                'benEstado',
                'benRut',
                'benDv',
                'benPNombre',
                'benSNombre',
                'benApPaterno',
                'benApMaterno',
                'benFecNac',
                'benTel',
                'benDom',
                'benTipViv',
                'benCobMed',
                'benNac',
                'benComuna',
                $colegio->id,
                $derivante->id,
                $antSalud->id,
                $antSocial->id,
                $diagnostico->id
            ];
            $beneficiario = $this->crearRegistro($request, Beneficiario::class, $beneficiarioColumnas, $beneficiarioCampos);
            // CREAR FAMILIARES
            $this->guardarFamiliares($request, $beneficiario->id);
            return redirect()->route('beneficiarios.listarBeneficiarios')->with('success', 'Beneficiario creado correctamente.');
        }
    }

    public function eliminarBeneficiario($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);

        $familiaresIds = $beneficiario->familiares->pluck('id');

        $beneficiario->familiares()->detach();

        Colegio::findOrFail($beneficiario->colegio_id)->delete();
        Derivante::findOrFail($beneficiario->derivante_id)->delete();
        antecedenteSalud::findOrFail($beneficiario->antSal_id)->delete();
        antecedenteSocial::findOrFail($beneficiario->antSoc_id)->delete();
        Diagnostico::findOrFail($beneficiario->diagnostico_id)->delete();

        Familiar::whereIn('id', $familiaresIds)
            ->doesntHave('beneficiarios')
            ->delete();

        $beneficiario->delete();

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
        $derivante = Derivante::findOrFail($beneficiario->derivante_id);
        $antSal = antecedenteSalud::findOrFail($beneficiario->antSal_id);
        $antSoc = antecedenteSocial::findOrFail($beneficiario->antSoc_id);
        $familiares = $beneficiario->familiares;
        return view(
            'beneficiario.fichaBeneficiario',
            compact(
                'beneficiario',
                'nacionalidad',
                'comuna',
                'cobMedica',
                'colegio',
                'derivante',
                'antSal',
                'antSoc',
                'familiares'
            )
        );
    }

    // MÉTODO PARA MOSTRAR FORMULARIO BENEFICIARIO RELLENO
    public function formBenRelleno($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $nacionalidades = Nacionalidad::all();
        $comunas = Comuna::all();
        $cobMedicas = Cob_Medica::all();
        $colegio = Colegio::findOrFail($beneficiario->colegio_id);
        $derivante = Derivante::findOrFail($beneficiario->derivante_id);
        $antSal = antecedenteSalud::findOrFail($beneficiario->antSal_id);
        $antSoc = antecedenteSocial::findOrFail($beneficiario->antSoc_id);
        $diagnostico = Diagnostico::findOrFail($beneficiario->diagnostico_id);
        $familiares = $beneficiario->familiares;

        // PROCESAR LA LISTA DE BENEFICIOS SOCIALES
        $beneficiosConocidos = [
            'Subsidio familiar',
            'Pensiones',
            'Becas',
            'Chile solidario',
            'Programa puente',
            'Subsidio ético familiar'
        ];
        $beneficiosSeleccionados = explode(', ', $antSoc->antSocBeneficio);
        $beneficiosMarcados = array_intersect($beneficiosSeleccionados, $beneficiosConocidos);
        $beneficioOtro = implode(', ', array_diff($beneficiosSeleccionados, $beneficiosConocidos));

        return view(
            'beneficiario.formulario.formularioBeneficiario',
            compact(
                'beneficiario',
                'nacionalidades',
                'comunas',
                'cobMedicas',
                'colegio',
                'derivante',
                'antSal',
                'antSoc',
                'diagnostico',
                'beneficiosMarcados',
                'beneficioOtro',
                'familiares'
            )
        );
    }

    public function exportarExcel($id)
    {
        return Excel::download(new BeneficiariosExport($id), 'beneficiario_'.$id.'.xlsx');
    }

}

<?php

namespace App\Http\Controllers;

// IMPORTAR REQUEST
use Illuminate\Http\Request;
// IMPORTAR MODELO BENEFICIARO
use App\Models\Beneficiario;
// IMPORTAR MODELO ANTECEDENTES DE SALUD
use App\Models\antecedenteSalud;
// IMPORTAR MODELO DIAGNOSTICO
use App\Models\Diagnostico;
// IMPORTAR MODELO DOCUMENTO
use App\Models\Documento;


class histMedicoController extends Controller
{
    // MÉTODO PARA MOSTRAR LOS ANTECEDENTES MÉDICOS DE UN BENEFICIARIO
    public function antMedBeneficiario($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $antSal = antecedenteSalud::findOrFail($beneficiario->antSal_id);
        $diagnostico = Diagnostico::findOrFail($beneficiario->diagnostico_id);
        return view('beneficiario.histMedico.antMedBeneficiario', compact('beneficiario', 'antSal', 'diagnostico'));
    }

    // MÉTODO PARA AÑADIR ARCHIVOS A LOS ANTECEDENTES MÉDICOS DE UN BENEFICIARIO
    public function agregarArchivo(Request $request) {
        $antSalId = $request->input('antSalId');
        $antSalud = AntecedenteSalud::findOrFail($antSalId);

        request()->validate([
            'antSalFile' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('antSalFile');

        if($request->hasFile('antSalFile')) {
            $timestamp = now()->format('Ymd_His');
            $uniqueName = $timestamp . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('beneficiarios', $uniqueName, 'public');
        }

        $documento = Documento::create([
            'antSalFilePath' => $filePath,
        ]);

        $antSalud->documentos()->attach($documento->id);

        return redirect()->back()->with('success', 'Archivos añadidos correctamente.');
    }

    // MÉTODO PARA ELIMINAR ARCHIVOS SUBIDOS EN LOS ANTECEDENTES MEDICOS
    public function eliminarArchivo($id)
    {
        $documento = Documento::findOrFail($id);
        $ruta_fisica = storage_path('app/public/' . $documento->antSalFilePath);
        if (file_exists($ruta_fisica)) {
            unlink($ruta_fisica);
        }
        $documento->antecedentesSalud()->detach();
        $documento->delete();
        return redirect()->back()->with('success', 'Archivo eliminado correctamente.');
    }
}

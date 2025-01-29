<?php

namespace App\Http\Controllers;

// IMPORTAMOS EL STORAGE
use Illuminate\Support\Facades\Storage;
// IMPORTAR MODELO BENEFICIARO
use App\Models\Beneficiario;
// IMPORTAR MODELO ANTECEDENTES DE SALUD
use App\Models\antecedenteSalud;
// IMPORTAR MODELO DIAGNOSTICO
use App\Models\Diagnostico;


class histMedicoController extends Controller
{
    // MÉTODO PARA MOSTRAR LOS ANTECEDENTES MÉDICOS DE UN BENEFICIARIO
    public function antMedBeneficiario($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $antSal = antecedenteSalud::findOrFail($beneficiario->antSal_id);
        $diagnostico = Diagnostico::findOrFail($beneficiario->diagnostico_id);
        return view('views.beneficiario.histMedico.antMedBeneficiario', compact('beneficiario', 'antSal', 'diagnostico'));
    }

    // MÉTODO PARA ELIMINAR ARCHIVOS SUBIDOS EN LOS ANTECEDENTES MEDICOS
    public function eliminarArchivo($id)
    {
        $antSal = antecedenteSalud::findOrFail($id);

        $ruta_fisica = storage_path('app/public/' . $antSal->antSalFilePath);

        if (file_exists($ruta_fisica)) {
            unlink($ruta_fisica);
            $antSal->antSalFilePath = null;
            $antSal->save();
            return redirect()->back()->with('success', 'Archivo eliminado correctamente.');
        }
        return redirect()->back()->with('error', 'El archivo no se encontró.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO COBERTURA MEDICA
use App\Models\Cob_Medica;

class cobMedController extends Controller
{
    // MÉTODO PARA MOSTRAR LA VISTA DEL CRUD 
    public function crudCobMedica()
    {
        $cobMedicas = Cob_Medica::all(); // LISTAR COBERTURAS MEDICAS
        return view('views.beneficiario.cobMedica.crudCobMedica', compact('cobMedicas'));
    }

    // MÉTODO PARA GUARDAR O ACTUALIZAR UNA COBERTURA MEDICA
    public function guardarCobMedica(Request $request) {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'cobMedNombre' => 'required|string|max:30|regex:/^[^<>]*$/|unique:cob__medica,nombreCobMed' . $request->cobMedId,
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA COBERTURA, SINO, LA CREAMOS
        if ($request->cobMedId) {
            $cobMed = Cob_Medica::findOrFail($request->cobMedId);
            // ACTUALIZAR COBERTURA EXISTENTE
            $cobMed->update([
                'nombreCobMed' => $request->cobMedNombre,
            ]);
            return redirect()->route('beneficiarios.crudCobMedica')->with('success', 'Cobertura médica actualizada correctamente.');
        } else {
            // CREAR NUEVA COBERTURA
            Cob_Medica::create([
                'nombreCobMed' => $request->cobMedNombre,
            ]);
            return redirect()->route('beneficiarios.crudCobMedica')->with('success', 'Cobertura médica creada correctamente.');
        }
    }

    // MÉTODO PARA ELIMINAR UNA COBERTURA
    public function eliminarCobMedica($id)
    {
        Cob_Medica::find($id)->delete();
        return redirect()->route('beneficiarios.crudCobMedica')->with('success', 'Cobertura médica eliminada correctamente.');
    }
}

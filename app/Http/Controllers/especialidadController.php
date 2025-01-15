<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO ESPECIALIDAD
use App\Models\Especialidad;

class especialidadController extends Controller
{
    // MÉTODO PARA MOSTRAR LA PÁGINA DEL CRUD
    public function crudEspecialidad()
    {
        $especialidades = Especialidad::all(); // LISTAR ESPECIALIDADES
        return view('views.especialistas.formEspecialidad', compact('especialidades'));
    }

    // MÉTODO PARA GUARDAR O ACTUALIZAR UNA ESPECIALIDAD
    public function guardarEspecialidad(Request $request) {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'especialidadNombre' => 'required|string|max:20|regex:/^[^<>]*$/',
            'especialidadAbrev' => 'nullable|string|max:5|regex:/^[^<>]*$/',
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA CATEGORÍA, SINO, LA CREAMOS
        if ($request->especialidadId) {
            $Especialidad = Especialidad::findOrFail($request->especialidadId);
            // ACTUALIZAR ESPECIALIDAD EXISTENTE
            $Especialidad->update([
                'especialidadNombre' => $request->especialidadNombre,
                'especialidadAbreviacion' => $request->especialidadAbrev,
            ]);
            return redirect()->route('especialistas.crudEspecialidad')->with('success', 'Especialidad actualizada correctamente.');
        } else {
            // CREAR NUEVA ESPECIALIDAD
            Especialidad::create([
                'especialidadNombre' => $request->especialidadNombre,
                'especialidadAbreviacion' => $request->especialidadAbrev,
            ]);
            return redirect()->route('especialistas.crudEspecialidad')->with('success', 'Especialidad creada correctamente.');
        }
    }

    // MÉTODO PARA ELIMINAR UNA ESPECIALIDAD
    public function eliminarEspecialidad($id)
    {
        Especialidad::find($id)->delete();
        return redirect()->route('especialistas.crudEspecialidad')->with('success', 'Especialidad eliminada correctamente.');
    }
}

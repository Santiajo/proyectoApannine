<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO ESPECIALIDAD
use App\Models\Nacionalidad;

class nacionalidadController extends Controller
{
    // MÉTODO PARA MOSTRAR LA VISTA DEL CRUD 
    public function crudNacionalidad()
    {
        $nacionalidades = Nacionalidad::all(); // LISTAR NACIONALIDADES
        return view('views.beneficiario.nacionalidad.crudNacionalidad', compact('nacionalidades'));
    }

    // MÉTODO PARA GUARDAR O ACTUALIZAR UNA NACIONALIDAD
    public function guardarNacionalidad(Request $request) {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'nacionalidadNombre' => 'required|string|max:30|regex:/^[^<>]*$/|unique:nacionalidad,nombreNacionalidad,' . $request->nacionalidadId,
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA NACIONALIDAD, SINO, LA CREAMOS
        if ($request->nacionalidadId) {
            $nacionalidad = Nacionalidad::findOrFail($request->nacionalidadId);
            // ACTUALIZAR COMUNA EXISTENTE
            $nacionalidad->update([
                'nombreNacionalidad' => $request->nacionalidadNombre,
            ]);
            return redirect()->route('beneficiarios.crudNacionalidad')->with('success', 'Nacionalidad actualizada correctamente.');
        } else {
            // CREAR NUEVA NACIONALIDAD
            Nacionalidad::create([
                'nombreNacionalidad' => $request->nacionalidadNombre,
            ]);
            return redirect()->route('beneficiarios.crudNacionalidad')->with('success', 'Nacionalidad creada correctamente.');
        }
    }

    // MÉTODO PARA ELIMINAR UNA NACIONALIDAD
    public function eliminarNacionalidad($id)
    {
        Nacionalidad::find($id)->delete();
        return redirect()->route('beneficiarios.crudNacionalidad')->with('success', 'Nacionalidad eliminada correctamente.');
    }
}

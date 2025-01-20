<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO COMUNA
use App\Models\Comuna;

class comunaController extends Controller
{
    // MÉTODO PARA MOSTRAR LA VISTA DEL CRUD 
    public function crudComuna()
    {
        $comunas = Comuna::all(); // LISTAR COMUNAS
        return view('views.beneficiario.comuna.crudComuna', compact('comunas'));
    }

    // MÉTODO PARA GUARDAR O ACTUALIZAR UNA COMUNA
    public function guardarComuna(Request $request) {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'comunaNombre' => 'required|string|max:30|regex:/^[^<>]*$/|unique:comuna,nombreComuna,' . $request->comunaId,
        ]);

        // SI SE RECIBE UN ID YA EXISTENTE, ACTUALIZAMOS LA COMUNA, SINO, LA CREAMOS
        if ($request->comunaId) {
            $cobMed = Comuna::findOrFail($request->comunaId);
            // ACTUALIZAR COMUNA EXISTENTE
            $cobMed->update([
                'nombreComuna' => $request->comunaNombre,
            ]);
            return redirect()->route('beneficiarios.crudComuna')->with('success', 'Comuna actualizada correctamente.');
        } else {
            // CREAR NUEVA COMUNA
            Comuna::create([
                'nombreComuna' => $request->comunaNombre,
            ]);
            return redirect()->route('beneficiarios.crudComuna')->with('success', 'Comuna creada correctamente.');
        }
    }

    // MÉTODO PARA ELIMINAR UNA COMUNA
    public function eliminarComuna($id)
    {
        Comuna::find($id)->delete();
        return redirect()->route('beneficiarios.crudComuna')->with('success', 'Comuna eliminada correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAR MODELO ESPECIALISTA
use App\Models\Especialista;

// IMPORTAR MODELO ESPECIALIDAD
use App\Models\Especialidad;


use App\Exports\EspecialistasExport;
use Maatwebsite\Excel\Facades\Excel;

class especialistaController extends Controller
{

    // METODO PARA EXPORTAR A EXCEL
    public function exportarEspecialistas(Request $request)
    {
        $request->validate([
            'fromDate' => 'required|date',
            'toDate' => 'required|date|after_or_equal:fromDate',
        ]);
    
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
    
        // Pasar las fechas al exportador
        return Excel::download(new EspecialistasExport($fromDate, $toDate), 'especialistas.xlsx');
    }


    // MÉTODO PARA MOSTRAR LA PÁGINA PRINCIPAL DEL CRUD
    public function listarEspecialistas(Request $request)
    {
        $search = $request->input('benBuscar'); // Captura el texto de búsqueda

        $especialistas = Especialista::query()
            ->when($search, function ($query) use ($search) {
                $query->where('especialistaPNombre', 'LIKE', "%{$search}%")
                      ->orWhere('especialistaSNombre', 'LIKE', "%{$search}%")
                      ->orWhere('especialistaRut', 'LIKE', "%{$search}%")
                      ->orWhere('especialistaCorreo', 'LIKE', "%{$search}%")
                      // Agregar búsqueda por especialidad
                      ->orWhereHas('especialidad', function ($q) use ($search) {
                          $q->where('especialidadNombre', 'LIKE', "%{$search}%");
                      });
            })
            ->paginate(10); // Paginar resultados
        
        $especialidades = Especialidad::all();
    
        return view('views.especialistas.fichaEspecialista', compact('especialistas', 'especialidades', 'search'));
    }
    
       
       


    // MÉTODO PARA MOSTRAR EL FORMULARIO DE CREACIÓN DE ESPECIALISTA
    public function formularioEspecialista()
    {
        $especialidades = Especialidad::all(); // LISTAR ESPECIALIDADES
        return view('views.especialistas.formEspecialista', compact('especialidades'));
    }

    // MÉTODO PARA ACTUALIZAR INFORMACIÓN DE UN ESPECIALISTA
    public function formularioEspecialistaRelleno($id)
    {
        $especialista = Especialista::findOrFail($id); // BUSCAR ESPECIALISTA POR ID
        $especialidades = Especialidad::all(); // LISTAR ESPECIALIDADES
        return view('views.especialistas.formEspecialista', compact('especialista'), compact('especialidades'));
    }

    // MÉTODO PARA GUARDAR O ACTUALIZAR UN ESPECIALISTA
    public function guardarEspecialista(Request $request)
    {
        // VALIDAR LA INFORMACIÓN RECIBIDA DEL FORMULARIO
        $request->validate([
            'espRut' => 'required|digits:8|regex:/^[0-9]+$/',
            'espDv' => 'required|string|max:1|regex:/^[0-9Kk]$/',
            'espPNombre' => 'required|string|max:20|regex:/^[^<>]*$/',
            'espSNombre' => 'nullable|string|max:20|regex:/^[^<>]*$/',
            'espApPaterno' => 'required|string|max:20|regex:/^[^<>]*$/',
            'espApMaterno' => 'required|string|max:20|regex:/^[^<>]*$/',
            'espTel' => 'required|string|min:7|max:15|regex:/^[0-9]+$/',
            'espEmail' => 'required|string|email|max:55',
            'espEspecialidad' => 'required|digits_between:1,20|regex:/^[^<>]*$/',
        ]);

        if ($request->especialistaId) {
            if ($request->especialistaId) {
                $Especialista = Especialista::findOrFail($request->especialistaId);
                // ACTUALIZAR ESPECIALIDAD EXISTENTE
                $Especialista->update([
                    'especialistaRut' => $request->espRut,
                    'especialistaDv' => $request->espDv,
                    'especialistaPNombre' => $request->espPNombre,
                    'especialistaSNombre' => $request->espSNombre,
                    'especialistaApPaterno' => $request->espApPaterno,
                    'especialistaApMaterno' => $request->espApMaterno,
                    'especialistaTelefono' => $request->espTel,
                    'especialistaCorreo' => $request->espEmail,
                    'especialidad_id' => $request->espEspecialidad,
                ]);
                return redirect()->route('especialistas.listarEspecialistas')->with('success', 'Información de especialista actualizada correctamente.');
            }
        } else {
            // AÑADIR ESPECIALISTA
            Especialista::create([
                'especialistaRut' => $request->espRut,
                'especialistaDv' => $request->espDv,
                'especialistaPNombre' => $request->espPNombre,
                'especialistaSNombre' => $request->espSNombre,
                'especialistaApPaterno' => $request->espApPaterno,
                'especialistaApMaterno' => $request->espApMaterno,
                'especialistaTelefono' => $request->espTel,
                'especialistaCorreo' => $request->espEmail,
                'especialidad_id' => $request->espEspecialidad,
            ]);
            return redirect()->route('especialistas.listarEspecialistas')->with('success', 'Especialidad agregado/a correctamente.');
        }
    }

    // MÉTODO PARA ELIMINAR UN ESPECIALISTA
    public function eliminarEspecialista($id)
    {
        Especialista::find($id)->delete();
        return redirect()->route('especialistas.listarEspecialistas')->with('success', 'Especialista eliminado/a correctamente.');
    }
}

 
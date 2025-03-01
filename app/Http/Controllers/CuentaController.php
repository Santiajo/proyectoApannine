<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CuentaController extends Controller
{
    //     public function index()
    // {
    //     $usuarios = User::paginate(10); // 🔹 Pagina los resultados
    //     return view('usuarios::fichausuarios', compact('usuarios'));
    // }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {

       
        $data = $request->validate([
            'userRut' => 'required|unique:users,rut',
            'userDv' => 'required|string|max:1',
            'userPNombre' => 'required|string|max:255',
            'userSNombre' => 'nullable|string|max:255',
            'userApPaterno' => 'required|string|max:255',
            'userApMaterno' => 'required|string|max:255',
            'userTel' => 'required|string|max:15',
            'userEmail' => 'required|email|unique:users,email',
            'userPass' => 'required|min:6|confirmed',
            'vistas' => 'array',  
            'vistas.*' => 'string|in:usuarios,beneficiarios,especialistas,talleres,asistencias',
        ]);
      
        // Crear usuario con los permisos extraídos del array "vistas"
        $user = User::create([
            'rut' => $data['userRut'],
            'dv' => $data['userDv'],
            'primer_nombre' => $data['userPNombre'],
            'segundo_nombre' => $data['userSNombre'] ?? null,
            'apellido_paterno' => $data['userApPaterno'],
            'apellido_materno' => $data['userApMaterno'],
            'telefono' => $data['userTel'],
            'email' => $data['userEmail'],
            'password' => Hash::make($data['userPass']),
    
            // Verificamos qué vistas fueron seleccionadas y las guardamos como 1 o 0
            'usuarios' => in_array('usuarios', $data['vistas']) ? 1 : 0,
            'beneficiarios' => in_array('beneficiarios', $data['vistas']) ? 1 : 0,
            'especialistas' => in_array('especialistas', $data['vistas']) ? 1 : 0,
            'talleres' => in_array('talleres', $data['vistas']) ? 1 : 0,
            'asistencias' => in_array('asistencias', $data['vistas']) ? 1 : 0,
        ]);
    
        if ($user) {
            return redirect()->route('usuarios.listar')->with('success', 'Usuario registrado correctamente.');
        } else {
            return back()->withErrors(['error' => 'No se pudo registrar el usuario.'])->withInput();
        }

        if ($request->filled('userPass')) {
            $usuario->password = bcrypt($request->userPass);
        }
    }
    

    /**
     * Elimina un usuario.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
    
        return redirect()->route('fichausuarios')->with('success', 'Usuario eliminado correctamente.');
    }


     /**
     * editar un usuario.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        
        return view('views.usuarios.formulariousuario', compact('usuario'));
    }


     /**
     * Actualiza un usuario.
     */

     public function update(Request $request, $id)
     {
         $usuario = User::findOrFail($id);
     
         $data = $request->validate([
             'userRut' => 'required|unique:users,rut,' . $id,
             'userDv' => 'required|string|max:1',
             'userPNombre' => 'required|string|max:255',
             'userSNombre' => 'nullable|string|max:255',
             'userApPaterno' => 'required|string|max:255',
             'userApMaterno' => 'required|string|max:255',
             'userTel' => 'required|string|max:15',
             'userEmail' => 'required|email|unique:users,email,' . $id,
             'vistas' => 'array',
             'vistas.*' => 'string|in:usuarios,beneficiarios,especialistas,talleres,asistencias',
         ]);
     
         $usuario->update([
             'rut' => $data['userRut'],
             'dv' => $data['userDv'],
             'primer_nombre' => $data['userPNombre'],
             'segundo_nombre' => $data['userSNombre'] ?? null,
             'apellido_paterno' => $data['userApPaterno'],
             'apellido_materno' => $data['userApMaterno'],
             'telefono' => $data['userTel'],
             'email' => $data['userEmail'],
             // Actualizamos permisos
             'usuarios' => in_array('usuarios', $data['vistas'] ?? []) ? 1 : 0,
             'beneficiarios' => in_array('beneficiarios', $data['vistas'] ?? []) ? 1 : 0,
             'especialistas' => in_array('especialistas', $data['vistas'] ?? []) ? 1 : 0,
             'talleres' => in_array('talleres', $data['vistas'] ?? []) ? 1 : 0,
             'asistencias' => in_array('asistencias', $data['vistas'] ?? []) ? 1 : 0,
         ]);
     
         return redirect()->route('fichausuarios')->with('success', 'Usuario actualizado correctamente.');
     }



        public function index(Request $request)
    {
        $search = $request->input('benBuscar'); 
        $request->validate([
            'benBuscar' => 'nullable|string|max:30|regex:/^[^<>]*$/',
        ]);
        $itemsPerPage = $request->input('items_per_page', 10); 

        $usuarios = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where('primer_nombre', 'LIKE', "%{$search}%")
                    ->orWhere('apellido_paterno', 'LIKE', "%{$search}%")
                    ->orWhere('rut', 'LIKE', "%{$search}%");
            })
            ->paginate($itemsPerPage) 
            ->withQueryString();

            return view('views.usuarios.fichausuarios', compact('usuarios', 'search', 'itemsPerPage'));

    }

}

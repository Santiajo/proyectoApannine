<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CuentaController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); // Obtener todos los usuarios
        return view('usuarios::fichausuarios', compact('usuarios'));

    }

    /**
     * Muestra el formulario de registro.
     */
    public function create()
    {
        return view('usuarios.formulariousuario');
    }

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
    ]);



    // Obtener vistas seleccionadas
    $vistas = [];
    foreach (['Usuarios', 'Beneficiarios', 'Especialistas', 'Especialidades', 'Asistencias'] as $index => $vista) {
        if ($request->has("userVista" . ($index + 1))) {
            $vistas[] = $vista;
        }
    }

  

    // Crear usuario
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
        'vistas' => $vistas, // Laravel maneja automáticamente los arrays en campos JSON
    ]);

    if ($user) {

        return redirect()->route('fichausuarios')->with('success', 'Usuario registrado correctamente.');
    } else {
   
        return back()->withErrors(['error' => 'No se pudo registrar el usuario.'])->withInput();
    }
}
    /**
     * Elimina un usuario.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
    
        return redirect()->route('cuenta.index')->with('success', 'Usuario eliminado correctamente.');
    }

     /**
     * editar un usuario.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id); // Buscar el usuario por ID
        return view('cuenta.edit', compact('usuario')); // Pasar el usuario a la vista
    }

     /**
     * Actualiza un usuario.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $usuario = User::findOrFail($id); // Buscar el usuario por ID
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->filled('password')) { // Si se ingresó una nueva contraseña
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save(); // Guardar los cambios

        return redirect()->route('cuenta.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function listarUsuarios(Request $request)
    {
        
        $search = $request->input('benBuscar'); // Captura el texto de búsqueda
        $itemsPerPage = $request->input('items_per_page', 10); // Cantidad de elementos por página
    
        $usuarios = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where('primer_nombre', 'LIKE', "%{$search}%")
                      ->orWhere('apellido_paterno', 'LIKE', "%{$search}%")
                      ->orWhere('rut', 'LIKE', "%{$search}%");
            })
            ->paginate($itemsPerPage)
            ->withQueryString(); // Mantener query params en la paginación

        
        return view('usuarios::fichausuarios', compact('usuarios', 'search', 'itemsPerPage'));
    }
}

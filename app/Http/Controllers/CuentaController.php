<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CuentaController extends Controller
{
    /**
     * Muestra la lista de usuarios registrados.
     */
    public function index()
    {
        $usuarios = User::all(); // Obtiene todos los usuarios
        return view('cuenta.index', compact('usuarios'));
    }

    /**
     * Muestra el formulario de registro.
     */
    public function create()
    {
        return view('cuenta.registro');
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
        public function store(Request $request)
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            $data['password'] = Hash::make($data['password']);

            User::create($data);

            return redirect()->route('cuenta.index')->with('success', 'Usuario registrado correctamente');
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



}

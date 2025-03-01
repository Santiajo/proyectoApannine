<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    // Mostrar la vista de login
    public function showLoginForm()
    {
        return view('login.login');
    }


    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar credenciales
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // 🔹 Depuración: Verifica qué credenciales se están enviando (sin contraseña por seguridad)
        Log::info('Intento de login', ['email' => $credentials['email']]);
    
        // 🔹 Intento de autenticación
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // 🔹 Depuración: Confirmar autenticación exitosa
            Log::info('Usuario autenticado', ['user_id' => Auth::id()]);
    
            return redirect()->route('beneficiarios.listarBeneficiarios');
        }
    
        // 🔹 Depuración: Si falló la autenticación, verifica el usuario en la base de datos
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if (!$user) {
            Log::warning('Intento de login fallido: Usuario no encontrado', ['email' => $credentials['email']]);
        } else {
            Log::warning('Intento de login fallido: Contraseña incorrecta', ['email' => $credentials['email']]);
        }
    
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }

    protected function redirectTo()
    {
        $user = auth()->user();
    
        if ($user->Beneficiarios) {
            return '/beneficiarios';
        } elseif ($user->Usuarios) {
            return '/usuarios';
        } elseif ($user->Especialistas) {
            return '/especialistas';
        } elseif ($user->Talleres) {
            return '/talleres';
        } elseif ($user->Asistencia) {
            return '/asistencia';
        } else {
            return '/403'; // Página de acceso denegado si no tiene permisos
        }
    }
    


    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Sesión cerrada.');
    }
}

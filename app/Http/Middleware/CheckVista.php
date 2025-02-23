<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckVista
{
    // public function handle(Request $request, Closure $next, $vista)
    // {
    //     $user = Auth::user(); // Obtener al usuario autenticado

    //     // Verificar si el usuario tiene la vista correspondiente en su listado de permisos
    //     if (!$user || !in_array($vista, $user->vistas ?? [])) {
    //         // Si no tiene acceso, retornar error 403
    //         abort(403, 'No tienes permiso para acceder a esta sección.');
    //     }

    //     return $next($request); // Continuar con la solicitud
    // }
}



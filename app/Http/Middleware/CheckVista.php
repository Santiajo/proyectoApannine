<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckVista
{
    public function handle(Request $request, Closure $next, string $vista)
    {
        $user = Auth::user();

        // Verifica si el usuario está autenticado y tiene el permiso correspondiente
        if (!$user || !$user->$vista) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}




<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y baneado
        if (Auth::check() && Auth::user()->banned) {
            // Desconectar al usuario
            Auth::logout();

            // Redirigir al usuario a la página de inicio con un mensaje de error
            return redirect()->route('login')->with('error', 'Tu cuenta ha sido baneada. Contacta con el administrador para más información.');
        }

        return $next($request);
    }
}
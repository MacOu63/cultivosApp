<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Log;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->rol !== 'admin') {
            try {
                // Usa el trait Bannable para banear al usuario
                $user->ban([
                    'comment' => 'Acceso no autorizado al CRUD'
                ]);

                Log::info('Usuario baneado: ' . $user->telefono);

            } catch (\Exception $e) {
                Log::error('Error al banear al usuario: ' . $e->getMessage());
            }

            // Cierra la sesión del usuario
            Auth::logout();

            // Redirige a la página de inicio de sesión con un mensaje de error
            return redirect('/login')->with('error', 'Acceso denegado.');
        }

        return $next($request);
    }
}

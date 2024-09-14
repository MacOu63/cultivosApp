<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Manejar la solicitud de inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->only('telefono', 'password');

        $validator = Validator::make($credentials, [
            'telefono' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirige según el rol del usuario
            if ($user->rol === 'admin') {
                return redirect()->route('usuarios.index'); // Ruta al CRUD
            } elseif ($user->rol === 'user') {
                return redirect()->route('welcome'); // Ruta a la página de bienvenida
            }
        }

        return Redirect::back()->withErrors([
            'telefono' => 'Número de teléfono o contraseña incorrectos.',
        ])->withInput();
    }

    // Manejar el cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige a la página de login después de cerrar la sesión
        return redirect()->route('login');
    }
}

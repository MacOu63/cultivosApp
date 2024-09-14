<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        // Validar los datos ingresados por el usuario
        $validator = Validator::make($request->all(), [
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15|unique:usuarios,telefono',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el nuevo usuario en la base de datos
        $usuario = Usuario::create([
            'nombre_usuario'   => $request->input('nombre'),
            'apellido_usuario' => $request->input('apellido'),
            'rol' => 'user', // Asume un rol predeterminado si no se especifica
            'telefono' => $request->input('telefono'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($usuario);

        // Redirigir a la página deseada después del registro
        return redirect()->route('login');
    }    
    
}

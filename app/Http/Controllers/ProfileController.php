<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        // Obtiene el usuario autenticado
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validar la entrada, incluyendo la imagen del avatar
        $request->validate([
            'nombre'           => 'nullable|string|max:255',
            'apellido'         => 'nullable|string|max:255',
            'telefono'         => 'nullable|string|max:15|unique:usuarios,telefono,' . Auth::id() . ',id',
            'current_password' => 'required_with:password|string',
            'password'         => 'nullable|string|min:8|confirmed',
            'avatar'           => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Verificar la contraseña actual
        if ($request->filled('current_password') && !Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta']);
        }

        // Actualizar el perfil del usuario
        $user = Auth::user();

        // Verificar si los campos están vacíos y mantener el valor actual si lo están

        if ($request->filled('nombre')) {
            $user->nombre_usuario = $request->nombre;
        }
    
        if ($request->filled('apellido')) {
            $user->apellido_usuario = $request->apellido;
        }
        
        if ($request->filled('telefono')) {
            $user->telefono = $request->telefono;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Manejo del avatar
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $user->image = $avatarName;  // Guarda el nombre de la imagen en la base de datos
        }

        $user->save();

        return redirect()->route('login')->with('success', 'Perfil actualizado correctamente');
    }
}
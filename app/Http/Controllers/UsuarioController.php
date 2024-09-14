<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Iniciar la consulta base
        $query = Usuario::query();

        // Obtener el valor del filtro de baneo
        //$bannedFilter = $request->input('banned');

        // Obtener el valor del filtro de rol
        $roleFilter = $request->input('rol'); // Asegúrate de que el nombre del campo coincide con el filtro en el formulario

        // Aplicar el filtro de baneo solo si la opción es '1' o '0'
        //if ($bannedFilter === '1') {
        //    $query->where('banned', true);
        //} elseif ($bannedFilter === '0') {
        //    $query->where('banned', false);
        //}

        
        // Aplicar el filtro de rol solo si la opción es 'user' o 'admin'
        if ($roleFilter === 'user') {
            $query->where('rol', 'user');
        } elseif ($roleFilter === 'admin') {
            $query->where('rol', 'admin');
        }

        // Capturar la cantidad de resultados por página seleccionada, por defecto 10
        $perPage = $request->input('results_per_page', 10);

        // Obtener todos los usuarios con paginación
        $usuarios = $query->paginate($perPage); // Ahora se aplican los filtros correctamente

        // Devolver la vista con los datos paginados
        return view('usuario.index', compact('usuarios'))
            ->with('i', ($request->input('page', 1) - 1) * $usuarios->perPage())
            ->with('results_per_page', $perPage); // Para que el valor seleccionado persista en la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $usuario = new Usuario();

        return view('usuario.create', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request): RedirectResponse
    {
        // Validar los datos
        $validatedData = $request->validated();

        // Verificar si el teléfono ya existe
        $telefonoExiste = Usuario::where('telefono', $validatedData['telefono'])->exists();

        if ($telefonoExiste) {
            return Redirect::back()->withErrors(['telefono' => 'El número de teléfono ya está en uso por otro usuario.']);
        }

        // Verificar si se ha proporcionado una contraseña
        if ($request->filled('password')) {
            // Cifrar la contraseña antes de guardarla
            $validatedData['password'] = Hash::make($request->password);
        }

        try {
            // Crear el usuario con los datos validados
            Usuario::create($validatedData);

            return Redirect::route('usuarios.index')
                ->with('success', '¡Usuario creado exitosamente!');
        } catch (QueryException $e) {
            // En caso de otro error de base de datos
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                // Manejar duplicados si necesario
                return Redirect::back()->withErrors(['generico' => 'Error al crear el usuario, por favor intente de nuevo.']);
            }
            return Redirect::back()->withErrors(['generico' => 'Error desconocido al crear el usuario.']);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $usuario = Usuario::find($id);

        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $usuario = Usuario::find($id);

        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, Usuario $usuario): RedirectResponse
    {
        // Validar los datos
        $validatedData = $request->validated();

        // Verificar si el teléfono ya existe y no pertenece al usuario actual
        $telefonoExiste = Usuario::where('telefono', $validatedData['telefono'])
                                ->where('id', '!=', $usuario->id)
                                ->exists();

        if ($telefonoExiste) {
            return Redirect::back()->withErrors(['telefono' => 'El número de teléfono ya está en uso por otro usuario.']);
        }

        // Verificar si se ha proporcionado una nueva contraseña
        if ($request->filled('password')) {
            // Cifrar la contraseña antes de guardarla
            $validatedData['password'] = Hash::make($request->password);
        } else {
            // Si no se proporciona contraseña, eliminar el campo password de la actualización
            unset($validatedData['password']);
        }

        try {
            // Actualizar el usuario con los datos validados
            $usuario->update($validatedData);

            return Redirect::route('usuarios.index')
                ->with('success', '¡Usuario actualizado exitosamente!');
        } catch (QueryException $e) {
            // En caso de otro error de base de datos
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                // Manejar duplicados si necesario
                return Redirect::back()->withErrors(['generico' => 'Error al actualizar el usuario, por favor intente de nuevo.']);
            }
            return Redirect::back()->withErrors(['generico' => 'Error desconocido al actualizar el usuario.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Usuario::find($id)->delete();

        return Redirect::route('usuarios.index')
            ->with('success', '¡Usuario eliminado exitosamente!');
    }

    /**
     * Show the form for login.
     */
    public function showLoginForm(): View
    {
        return view('login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('telefono', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the desired location
            return redirect()->intended('/usuarios');
        }

        // Authentication failed, redirect back with error
        return redirect()->back()->withErrors([
            'telefono' => 'Número de teléfono o contraseña incorrectos.',
        ])->withInput($request->except('password'));
    }

    /**
     * Handle logout request.
     */

    public function logout():RedirectResponse
    {
        Auth::logout();

        return redirect('/');
    }

    public function getUserData()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json([
                'nombre_usuario' => $user->nombre_usuario,
                'apellido_usuario' => $user->apellido_usuario,
            ]);
        }

        return response()->json(['error' => 'No authenticated user'], 401);
    }

    public function ban($id)
{
    $usuario = Usuario::findOrFail($id);

    Log::info("Estado actual del usuario antes de la actualización: " . $usuario->banned);

    if ($usuario->banned) {
        $usuario->banned = false; // Desbanear
        $message = '¡Usuario desbaneado exitosamente!';
    } else {
        $usuario->banned = true; // Banear
        $message = '¡Usuario baneado exitosamente!';
    }

    $usuario->save();

    Log::info("Estado del usuario después de la actualización: " . $usuario->banned);

    return redirect()->back()->with('success', $message);
}




}
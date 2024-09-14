<?php

namespace App\Http\Controllers;

use App\Models\Anunciante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnuncianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Validar que el término de búsqueda solo contenga letras y espacios
        $request->validate([
            'search' => 'nullable|regex:/^[\pL\s]+$/u'  // Acepta letras y espacios
        ]);//

        $search = $request->input('search'); // Captura el término de búsqueda

        // Verificar si el término de búsqueda existe en los títulos de las noticias
        $anuncianteExists = Anunciante::where('titulo', 'like', "%{$search}%")->exists();

        if ($search && !$anuncianteExists) {
            // Añadir un mensaje de advertencia si no se encuentra la noticia
            $warningMessage = 'No se encontró ningún anunciante con el nombre ingresado.';
        } else {
            $warningMessage = null;
        }

        // Capturar la cantidad de resultados por página seleccionada, por defecto 10
        $perPage = $request->input('results_per_page', 10);

        // Aplicar el filtro de búsqueda si existe
        $anunciantes = Anunciante::when($search, function ($query, $search) {
                return $query->where('titulo', 'like', "%{$search}%");
            })
            ->paginate($perPage); // Utiliza la cantidad seleccionada para la paginación

        // Devolver la vista con los datos paginados y el mensaje de advertencia
        return view('anunciante.index', compact('anunciantes', 'search', 'warningMessage'))
            ->with('i', ($request->input('page', 1) - 1) * $anunciantes->perPage())
            ->with('results_per_page', $perPage); // Para que el valor seleccionado persista en la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $anunciante = new Anunciante();
        // Filtrar usuarios con rol de admin
        $usuarios = \App\Models\Usuario::where('rol', 'admin')
                      ->select(\DB::raw("CONCAT(nombre_usuario, ' ', apellido_usuario) AS nombre_completo"), 'id')
                      ->pluck('nombre_completo', 'id');
    
        return view('anunciante.create', compact('anunciante', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar los datos de la solicitud
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'contenido' => 'required|string|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'=> 'nullable|string|max:222',
            'addedBy' => [
                'required',
                'exists:usuarios,id',
                function ($attribute, $value, $fail) {
                    if (!\App\Models\Usuario::where('id', $value)->where('rol', 'admin')->exists()) {
                        $fail('The selected user is not an admin.');
                    }
                },
            ],
        ]);

        $anunciante = new Anunciante($request->all());

        if ($request->hasFile('image')) {
            $anunciante->image = $request->file('image')->store('images', 'public');
        }

        $anunciante->save();

        return Redirect::route('anunciantes.index')
            ->with('success', '¡Anunciante creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $anunciante = Anunciante::findOrFail($id);

        return view('anunciante.show', compact('anunciante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $anunciante = Anunciante::findOrFail($id);
        // Filtrar usuarios con rol de admin
        $usuarios = \App\Models\Usuario::where('rol', 'admin')
                      ->select(\DB::raw("CONCAT(nombre_usuario, ' ', apellido_usuario) AS nombre_completo"), 'id')
                      ->pluck('nombre_completo', 'id');
    
        return view('anunciante.edit', compact('anunciante', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anunciante $anunciante): RedirectResponse
    {
        // Validar los datos de la solicitud
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'contenido' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link'=> 'nullable|string|max:222',
            'addedBy' => [
                'required',
                'exists:usuarios,id',
                function ($attribute, $value, $fail) {
                    if (!\App\Models\Usuario::where('id', $value)->where('rol', 'admin')->exists()) {
                        $fail('The selected user is not an admin.');
                    }
                },
            ],
        ]);

        // Actualizar el resto de los campos
        $anunciante->update($request->all());

        // Verificar si se subió una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($anunciante->image) {
                Storage::disk('public')->delete($anunciante->image);
            }
            // Guardar la nueva imagen
            $anunciante->image = $request->file('image')->store('images', 'public');
            $anunciante->save(); // Guardar los cambios en la base de datos
        }

        return Redirect::route('anunciantes.index')
            ->with('success', '¡Anunciante actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $anunciante = Anunciante::findOrFail($id);
        
        // Eliminar la imagen asociada
        if ($anunciante->image) {
            Storage::disk('public')->delete($anunciante->image);
        }
        
        $anunciante->delete();

        return Redirect::route('anunciantes.index')
            ->with('success', '¡Anunciante eliminado exitosamente!');
    }

    public function inicio(): View
    {
        $anunciantes = Anunciante::with('usuario')->get(); // Obtener todos los anunciantes con la relación de usuario

        // Pasar la variable $anunciantes a las dos vistas
        return view('inicio.inicio', compact('anunciantes'))
            ->with('anunciantes', $anunciantes);
    }

    public function welcome(): View
    {
        $anunciantes = Anunciante::with('usuario')->get(); // Obtener todos los anunciantes con la relación de usuario

        // Pasar la variable $anunciantes a la vista welcome
        return view('welcome', compact('anunciantes'));
    }


}
<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NoticiaController extends Controller
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
        $noticiaExists = Noticia::where('titulo', 'like', "%{$search}%")->exists();

        if ($search && !$noticiaExists) {
            // Añadir un mensaje de advertencia si no se encuentra la noticia
            $warningMessage = 'No se encontró ninguna noticia con el título ingresado.';
        } else {
            $warningMessage = null;
        }

        // Capturar la cantidad de resultados por página seleccionada, por defecto 10
        $perPage = $request->input('results_per_page', 10);

        // Aplicar el filtro de búsqueda si existe
        $noticias = Noticia::when($search, function ($query, $search) {
                return $query->where('titulo', 'like', "%{$search}%");
            })
            ->paginate($perPage); // Utiliza la cantidad seleccionada para la paginación

        // Devolver la vista con los datos paginados y el mensaje de advertencia
        return view('noticia.index', compact('noticias'))
            ->with('i', ($request->input('page', 1) - 1) * $noticias->perPage())
            ->with('results_per_page', $perPage); // Para que el valor seleccionado persista en la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $noticia = new Noticia();
        // Filtrar usuarios con rol de admin
        $usuarios = \App\Models\Usuario::where('rol', 'admin')
                      ->select(\DB::raw("CONCAT(nombre_usuario, ' ', apellido_usuario) AS nombre_completo"), 'id')
                      ->pluck('nombre_completo', 'id');
    
        return view('noticia.create', compact('noticia', 'usuarios'));
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

        $noticia = new Noticia($request->all());

        if ($request->hasFile('image')) {
            $noticia->image = $request->file('image')->store('images', 'public');
        }

        $noticia->save();

        return Redirect::route('noticias.index')
            ->with('success', '¡Noticia creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $noticia = Noticia::findOrFail($id);

        return view('noticia.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $noticia = Noticia::findOrFail($id);
        // Filtrar usuarios con rol de admin
        $usuarios = \App\Models\Usuario::where('rol', 'admin')
                      ->select(\DB::raw("CONCAT(nombre_usuario, ' ', apellido_usuario) AS nombre_completo"), 'id')
                      ->pluck('nombre_completo', 'id');
    
        return view('noticia.edit', compact('noticia', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia): RedirectResponse
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
        $noticia->update($request->all());

        // Verificar si se subió una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($noticia->image) {
                Storage::disk('public')->delete($noticia->image);
            }
            // Guardar la nueva imagen
            $noticia->image = $request->file('image')->store('images', 'public');
            $noticia->save(); // Guardar los cambios en la base de datos
        }

        return Redirect::route('noticias.index')
            ->with('success', '¡Noticia actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $noticia = Noticia::findOrFail($id);
        
        // Eliminar la imagen asociada
        if ($noticia->image) {
            Storage::disk('public')->delete($noticia->image);
        }
        
        $noticia->delete();

        return Redirect::route('noticias.index')
            ->with('success', '¡Noticia eliminada exitosamente!');
    }

    /**
     * Método para mostrar las noticias en la página de inicio.
     */
    public function inicio(): View
    {
        $noticias = Noticia::with('usuario')->get(); // Obtener todas las noticias con la relación de usuario

        return view('noticias.inicio', compact('noticias')); // Pasar la variable $noticias a la vista
    }
}
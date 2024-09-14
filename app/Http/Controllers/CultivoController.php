<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CultivoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CultivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Validar que el término de búsqueda solo contenga letras y espacios
        $request->validate([
            'search' => 'nullable|regex:/^[\pL\s]+$/u'  // Acepta letras y espacios
        ]);

        $search = $request->input('search'); // Captura el término de búsqueda

        // Verificar si el término de búsqueda existe en los cultivos
        $cultivoExists = Cultivo::where('nombre', 'like', "%{$search}%")->exists();

        if ($search && !$cultivoExists) {
            // Añadir un mensaje de advertencia si no se encuentra el cultivo
            $warningMessage = 'No se encontró ningún cultivo con el nombre ingresado.';
        } else {
            $warningMessage = null;
        }

        // Capturar la cantidad de resultados por página seleccionada, por defecto 10
        $perPage = $request->input('results_per_page', 10);

        // Aplicar el filtro de búsqueda si existe
        $cultivos = Cultivo::when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%");
            })
            ->paginate($perPage); // Utiliza la cantidad seleccionada para la paginación

        // Devolver la vista con los datos paginados y el mensaje de advertencia
        return view('cultivo.index', compact('cultivos', 'search', 'warningMessage'))
            ->with('i', ($request->input('page', 1) - 1) * $cultivos->perPage())
            ->with('results_per_page', $perPage); // Para que el valor seleccionado persista en la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cultivo = new Cultivo();

        return view('cultivo.create', compact('cultivo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CultivoRequest $request): RedirectResponse
    {
        Cultivo::create($request->validated());

        // Guardar un mensaje de éxito en la sesión
        session()->flash('success', '¡Cultivo creado exitosamente!');

        return Redirect::route('cultivos.index')
            ->with('success', '¡Cultivo creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cultivo = Cultivo::find($id);

        return view('cultivo.show', compact('cultivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cultivo = Cultivo::find($id);

        return view('cultivo.edit', compact('cultivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CultivoRequest $request, Cultivo $cultivo): RedirectResponse
    {
        $cultivo->update($request->validated());

        // Guardar un mensaje de éxito en la sesión
        session()->flash('success', '¡Cultivo actualizado exitosamente!');

        return Redirect::route('cultivos.index')
            ->with('success', '¡Cultivo actualizado exitosamente!');
    }

    public function destroy($id): RedirectResponse
    {
        Cultivo::find($id)->delete();

        session()->flash('success', '¡Cultivo eliminado exitosamente!');

        return Redirect::route('cultivos.index')
            ->with('success', '¡Cultivo eliminado exitosamente!');
    }
}

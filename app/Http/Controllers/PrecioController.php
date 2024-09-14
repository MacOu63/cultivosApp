<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Cultivo;
use App\Models\Precio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PrecioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
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
        $precios = Precio::with('cultivo', 'departamento')
            ->when($search, function ($query, $search) {
                return $query->whereHas('cultivo', function ($q) use ($search) {
                    $q->where('nombre', 'like', "%{$search}%");
                });
            })
            ->paginate($perPage); // Utiliza la cantidad seleccionada para la paginación

        // Devolver la vista con los datos paginados y el mensaje de advertencia
        return view('precio.index', compact('precios', 'search', 'warningMessage'))
            ->with('i', ($request->input('page', 1) - 1) * $precios->perPage())
            ->with('results_per_page', $perPage); // Para que el valor seleccionado persista en la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $precio = new Precio();
        $cultivo= Cultivo::pluck('nombre','id');
        $departamento= Departamento::pluck('nombre','id');

        return view('precio.create', compact('precio','cultivo','departamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrecioRequest $request): RedirectResponse
    {
        Precio::create($request->validated());

        return Redirect::route('precios.index')
            ->with('success', '¡Precio creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $precio = Precio::with(['cultivo', 'departamento'])->findOrFail($id);

        return view('precio.show', compact('precio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $precio = Precio::find($id);
        $cultivo= Cultivo::pluck('nombre','id');
        $departamento= Departamento::pluck('nombre','id');

        return view('precio.edit', compact('precio','cultivo','departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrecioRequest $request, Precio $precio): RedirectResponse
    {
        $precio->update($request->validated());

        return Redirect::route('precios.index')
            ->with('success', '¡Precio actualizado exitosamente!');
    }

    public function destroy($id): RedirectResponse
    {
        Precio::find($id)->delete();

        return Redirect::route('precios.index')
            ->with('success', '¡Precio eliminado exitosamente!');
    }
}

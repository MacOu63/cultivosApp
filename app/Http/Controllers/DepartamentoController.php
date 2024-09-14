<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DepartamentoController extends Controller
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

        // Verificar si el término de búsqueda existe en los departamentos
        $departamentoExists = Departamento::where('nombre', 'like', "%{$search}%")->exists();

        if ($search && !$departamentoExists) {
            // Añadir un mensaje de advertencia si no se encuentra el departamento
            $warningMessage = 'No se encontró ningún departamento con el nombre ingresado.';
        } else {
            $warningMessage = null;
        }

        // Capturar la cantidad de resultados por página seleccionada, por defecto 10
        $perPage = $request->input('results_per_page', 7);

        // Aplicar el filtro de búsqueda si existe
        $departamentos = Departamento::when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%");
            })
            ->paginate($perPage); // Utiliza la cantidad seleccionada para la paginación

        // Devolver la vista con los datos paginados y el mensaje de advertencia
        return view('departamento.index', compact('departamentos', 'search', 'warningMessage'))
            ->with('i', ($request->input('page', 1) - 1) * $departamentos->perPage())
            ->with('results_per_page', $perPage); // Para que el valor seleccionado persista en la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $departamento = new Departamento();

        return view('departamento.create', compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartamentoRequest $request): RedirectResponse
    {
        Departamento::create($request->validated());

        return Redirect::route('departamentos.index')
            ->with('success', '¡Departamento creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $departamento = Departamento::find($id);

        return view('departamento.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $departamento = Departamento::find($id);

        return view('departamento.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartamentoRequest $request, Departamento $departamento): RedirectResponse
    {
        $departamento->update($request->validated());

        return Redirect::route('departamentos.index')
            ->with('success', '¡Departamento actualizado exitosamente!');
    }

    public function destroy($id): RedirectResponse
    {
        Departamento::find($id)->delete();

        return Redirect::route('departamentos.index')
            ->with('success', '¡Departamento eliminado exitosamente!');
    }
}

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
        $precios = Precio::paginate();

        return view('precio.index', compact('precios'))
            ->with('i', ($request->input('page', 1) - 1) * $precios->perPage());
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
            ->with('success', 'Precio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $precio = Precio::find($id);

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
            ->with('success', 'Precio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Precio::find($id)->delete();

        return Redirect::route('precios.index')
            ->with('success', 'Precio deleted successfully');
    }
}

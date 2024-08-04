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
    public function index(Request $request): View
    {
        $cultivos = Cultivo::paginate();

        return view('cultivo.index', compact('cultivos'))
            ->with('i', ($request->input('page', 1) - 1) * $cultivos->perPage());
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

        return Redirect::route('cultivos.index')
            ->with('success', 'Cultivo created successfully.');
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

        return Redirect::route('cultivos.index')
            ->with('success', 'Cultivo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Cultivo::find($id)->delete();

        return Redirect::route('cultivos.index')
            ->with('success', 'Cultivo deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Preferencia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PreferenciaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PreferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $preferencias = Preferencia::paginate();

        return view('preferencia.index', compact('preferencias'))
            ->with('i', ($request->input('page', 1) - 1) * $preferencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $preferencia = new Preferencia();

        return view('preferencia.create', compact('preferencia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PreferenciaRequest $request): RedirectResponse
    {
        Preferencia::create($request->validated());

        return Redirect::route('preferencias.index')
            ->with('success', 'Preferencia created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $preferencia = Preferencia::find($id);

        return view('preferencia.show', compact('preferencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $preferencia = Preferencia::find($id);

        return view('preferencia.edit', compact('preferencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PreferenciaRequest $request, Preferencia $preferencia): RedirectResponse
    {
        $preferencia->update($request->validated());

        return Redirect::route('preferencias.index')
            ->with('success', 'Preferencia updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Preferencia::find($id)->delete();

        return Redirect::route('preferencias.index')
            ->with('success', 'Preferencia deleted successfully');
    }
}

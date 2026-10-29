<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitanteRequest;
use App\Models\Solicitante;

class SolicitanteController extends Controller
{
    public function index()
    {
        return view('solicitantes.index', ['solicitantes' => Solicitante::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('solicitantes.create');
    }

    public function store(SolicitanteRequest $request)
    {
        Solicitante::create($request->validated());

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante creado correctamente.');
    }

    public function show(Solicitante $solicitante)
    {
        return view('solicitantes.show', compact('solicitante'));
    }

    public function edit(Solicitante $solicitante)
    {
        return view('solicitantes.edit', compact('solicitante'));
    }

    public function update(SolicitanteRequest $request, Solicitante $solicitante)
    {
        $solicitante->update($request->validated());

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante actualizado correctamente.');
    }

    public function destroy(Solicitante $solicitante)
    {
        $solicitante->delete();

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante eliminado correctamente.');
    }
}

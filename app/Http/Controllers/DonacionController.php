<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonacionRequest;
use App\Models\Donacion;

class DonacionController extends Controller
{
    public function index()
    {
        return view('donaciones.index', ['donaciones' => Donacion::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('donaciones.create');
    }

    public function store(DonacionRequest $request)
    {
        Donacion::create($request->validated());

        return redirect()->route('donaciones.index')->with('success', 'Donación creada correctamente.');
    }

    public function show(Donacion $donacion)
    {
        return view('donaciones.show', compact('donacion'));
    }

    public function edit(Donacion $donacion)
    {
        return view('donaciones.edit', compact('donacion'));
    }

    public function update(DonacionRequest $request, Donacion $donacion)
    {
        $donacion->update($request->validated());

        return redirect()->route('donaciones.index')->with('success', 'Donación actualizada correctamente.');
    }

    public function destroy(Donacion $donacion)
    {
        $donacion->delete();

        return redirect()->route('donaciones.index')->with('success', 'Donación eliminada correctamente.');
    }
}

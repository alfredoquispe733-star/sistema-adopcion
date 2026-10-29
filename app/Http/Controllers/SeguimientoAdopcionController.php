<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeguimientoAdopcionRequest;
use App\Models\SeguimientoAdopcion;
use App\Models\Solicitud;
use App\Models\User;

class SeguimientoAdopcionController extends Controller
{
    public function index()
    {
        $seguimientos = SeguimientoAdopcion::with(['solicitud.solicitante', 'solicitud.mascota', 'visitador'])
            ->latest()
            ->paginate(15);

        return view('seguimientos_adopcion.index', compact('seguimientos'));
    }

    public function create()
    {
        $solicitudes = Solicitud::with(['solicitante', 'mascota'])->get();
        $users = User::all();

        return view('seguimientos_adopcion.create', compact('solicitudes', 'users'));
    }

    public function store(SeguimientoAdopcionRequest $request)
    {
        SeguimientoAdopcion::create($request->validated());

        return redirect()->route('seguimientos_adopcion.index')
            ->with('success', 'Seguimiento de adopción registrado correctamente.');
    }

    public function show(SeguimientoAdopcion $seguimientoAdopcion)
    {
        $seguimientoAdopcion->load(['solicitud.solicitante', 'solicitud.mascota', 'visitador']);

        // Alias para que coincida exactamente con la variable que usa la vista show.blade.php
        $seguimiento = $seguimientoAdopcion;

        return view('seguimientos_adopcion.show', compact('seguimiento'));
    }

    public function edit(SeguimientoAdopcion $seguimientoAdopcion)
    {
        $solicitudes = Solicitud::with(['solicitante', 'mascota'])->get();
        $users = User::all();

        return view('seguimientos_adopcion.edit', compact('seguimientoAdopcion', 'solicitudes', 'users'));
    }

    public function update(SeguimientoAdopcionRequest $request, SeguimientoAdopcion $seguimientoAdopcion)
    {
        $seguimientoAdopcion->update($request->validated());

        return redirect()->route('seguimientos_adopcion.index')
            ->with('success', 'Seguimiento de adopción actualizado correctamente.');
    }

    public function destroy(SeguimientoAdopcion $seguimientoAdopcion)
    {
        $seguimientoAdopcion->delete();

        return redirect()->route('seguimientos_adopcion.index')
            ->with('success', 'Seguimiento de adopción eliminado correctamente.');
    }
}

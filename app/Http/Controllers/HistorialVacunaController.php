<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistorialVacunaRequest;
use App\Models\Doctor;
use App\Models\HistorialVacuna;
use App\Models\Mascota;

class HistorialVacunaController extends Controller
{
    public function index()
    {
        $historialVacunas = HistorialVacuna::with(['mascota', 'doctor'])->latest()->paginate(15);

        return view('historial_vacunas.index', compact('historialVacunas'));
    }

    public function create()
    {
        $mascotas = Mascota::all();
        $doctores = Doctor::all();

        return view('historial_vacunas.create', compact('mascotas', 'doctores'));
    }

    public function store(HistorialVacunaRequest $request)
    {
        HistorialVacuna::create($request->validated());

        return redirect()->route('historial_vacunas.index')
            ->with('success', 'Historial de vacuna registrado correctamente.');
    }

    public function show(HistorialVacuna $historialVacuna)
    {
        // Carga las relaciones necesarias
        $historialVacuna->load(['mascota', 'doctor']);

        // Alias por si la vista utiliza la variable $historial
        $historial = $historialVacuna;

        return view('historial_vacunas.show', compact('historialVacuna', 'historial'));
    }

    public function edit(HistorialVacuna $historialVacuna)
    {
        $mascotas = Mascota::all();
        $doctores = Doctor::all();

        return view('historial_vacunas.edit', compact('historialVacuna', 'mascotas', 'doctores'));
    }

    public function update(HistorialVacunaRequest $request, HistorialVacuna $historialVacuna)
    {
        $historialVacuna->update($request->validated());

        return redirect()->route('historial_vacunas.index')
            ->with('success', 'Historial de vacuna actualizado correctamente.');
    }

    public function destroy(HistorialVacuna $historialVacuna)
    {
        $historialVacuna->delete();

        return redirect()->route('historial_vacunas.index')
            ->with('success', 'Historial de vacuna eliminado correctamente.');
    }
}

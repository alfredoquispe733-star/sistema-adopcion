<?php

namespace App\Http\Controllers;

use App\Http\Requests\TratamientoRequest;
use App\Models\Doctor;
use App\Models\Mascota;
use App\Models\Tratamiento;

class TratamientoController extends Controller
{
    public function index()
    {
        return view('tratamientos.index', ['tratamientos' => Tratamiento::latest()->paginate(15)]);
    }

    public function create()
    {
        $mascotas = Mascota::all();
        $doctores = Doctor::all();

        return view('tratamientos.create', compact('mascotas', 'doctores'));
    }

    public function store(TratamientoRequest $request)
    {
        Tratamiento::create($request->validated());

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento registrado correctamente.');
    }

    public function show(Tratamiento $tratamiento)
    {
        return view('tratamientos.show', compact('tratamiento'));
    }

    public function edit(Tratamiento $tratamiento)
    {
        $mascotas = Mascota::all();
        $doctores = Doctor::all();

        return view('tratamientos.edit', compact('tratamiento', 'mascotas', 'doctores'));
    }

    public function update(TratamientoRequest $request, Tratamiento $tratamiento)
    {
        $tratamiento->update($request->validated());

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento actualizado correctamente.');
    }

    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento eliminado correctamente.');
    }

    public function rules(): array
    {
        return [
            'fecha_inicio' => 'required|date',
            // 'after_or_equal' exige que fecha_fin sea igual o posterior a fecha_inicio
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ];
    }

    public function messages(): array
    {
        return [
            'fecha_fin.after_or_equal' => 'La fecha de fin no puede ser anterior a la fecha de inicio.',
        ];
    }
}

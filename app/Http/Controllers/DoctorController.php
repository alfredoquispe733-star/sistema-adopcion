<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctores.index', ['doctores' => Doctor::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('doctores.create');
    }

    public function store(DoctorRequest $request)
    {
        Doctor::create($request->validated());

        return redirect()->route('doctores.index')->with('success', 'Doctor creado correctamente.');
    }

    public function show(Doctor $doctor)
    {
        return view('doctores.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('doctores.edit', compact('doctor'));
    }

    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());

        return redirect()->route('doctores.index')->with('success', 'Doctor actualizado correctamente.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctores.index')->with('success', 'Doctor eliminado correctamente.');
    }
}

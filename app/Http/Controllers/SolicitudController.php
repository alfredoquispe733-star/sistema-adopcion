<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitudRequest;
use App\Models\Mascota;
use App\Models\Solicitante;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    public function index()
    {
        return view('solicitudes.index', ['solicitudes' => Solicitud::latest()->paginate(15)]);
    }

    public function create()
    {
        $solicitantes = Solicitante::all();
        $mascotas = Mascota::all();

        return view('solicitudes.create', compact('solicitantes', 'mascotas'));
    }

    public function store(SolicitudRequest $request)
    {
        $data = $request->validated();

        // Separar datos del solicitante y de la solicitud
        $solicitanteData = $request->only([
            'nombre', 'apellido', 'email', 'telefono', 'direccion',
            'tipo_vivienda', 'tiene_mascotas_actuales', 'ci_dni',
        ]);

        // Asegurar que ci_dni tenga un valor por defecto si no se proporciona
        $solicitanteData['ci_dni'] = $solicitanteData['ci_dni'] ?? 'N/A';

        $solicitudData = $request->only([
            'mascota_id', 'motivo_adopcion', 'experiencia_previa',
            'todos_de_acuerdo',
        ]);

        // Crear o buscar solicitante por email
        $solicitante = Solicitante::firstOrCreate(
            ['email' => $solicitanteData['email']],
            $solicitanteData
        );

        // Si el solicitante ya existía, actualizar sus datos
        if (! $solicitante->wasRecentlyCreated) {
            $solicitante->update($solicitanteData);
        }

        // Crear la solicitud asociada
        $solicitudData['solicitante_id'] = $solicitante->id;
        $solicitudData['estado'] = 'pendiente';

        Solicitud::create($solicitudData);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud de adopción enviada correctamente. Nos pondremos en contacto contigo pronto.');
    }

    public function show(Solicitud $solicitud)
    {
        return view('solicitudes.show', compact('solicitud'));
    }

    public function edit(Solicitud $solicitud)
    {
        $solicitantes = Solicitante::all();
        $mascotas = Mascota::all();

        return view('solicitudes.edit', compact('solicitud', 'solicitantes', 'mascotas'));
    }

    public function update(SolicitudRequest $request, Solicitud $solicitud)
    {
        $data = $request->validated();

        // Separar datos del solicitante y de la solicitud
        $solicitanteData = $request->only([
            'nombre', 'apellido', 'email', 'telefono', 'direccion',
            'tipo_vivienda', 'tiene_mascotas_actuales', 'ci_dni',
        ]);

        // Asegurar que ci_dni tenga un valor por defecto si no se proporciona
        $solicitanteData['ci_dni'] = $solicitanteData['ci_dni'] ?? 'N/A';

        $solicitudData = $request->only([
            'mascota_id', 'motivo_adopcion', 'experiencia_previa',
            'todos_de_acuerdo', 'estado', 'observacion_admin',
        ]);

        // Actualizar solicitante si existe
        if ($solicitud->solicitante) {
            $solicitud->solicitante->update($solicitanteData);
        }

        // Actualizar la solicitud
        $solicitud->update($solicitudData);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente.');
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada correctamente.');
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientoAdopcionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'solicitud_id' => 'required|integer|exists:solicitudes,id',
            'visitador_id' => 'required|integer|exists:users,id',
            'fecha_visita' => 'required|date',
            'estado_mascota' => 'required|string|max:255',
            'observaciones' => 'nullable|string',
            'fotografia_evidencia' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'solicitud_id' => 'solicitud',
            'visitador_id' => 'visitador',
            'fecha_visita' => 'fecha de visita',
            'estado_mascota' => 'estado de la mascota',
            'observaciones' => 'observaciones',
            'fotografia_evidencia' => 'fotografía de evidencia',
        ];
    }
}

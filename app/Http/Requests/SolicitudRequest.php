<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Datos del solicitante
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'tipo_vivienda' => 'required|string|max:100',
            'ci_dni' => 'nullable|string|max:20',
            'tiene_mascotas_actuales' => 'nullable|boolean',

            // Datos de la solicitud
            'mascota_id' => 'required|exists:mascotas,id',
            'motivo_adopcion' => 'required|string',
            'experiencia_previa' => 'required|string',
            'todos_de_acuerdo' => 'required|boolean',

            // Para edición desde admin
            'solicitante_id' => 'sometimes|exists:solicitantes,id',
            'estado' => 'nullable|string|max:50',
            'observacion_admin' => 'nullable|string',
        ];
    }
}

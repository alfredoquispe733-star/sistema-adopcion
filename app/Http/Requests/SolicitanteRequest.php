<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SolicitanteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Obtenemos el solicitante de la ruta (puede ser un objeto o null si es store)
        $solicitante = $this->route('solicitante');
        $solicitanteId = is_object($solicitante) ? $solicitante->id : $solicitante;

        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            // Usando Rule::unique evitamos problemas de concatenación de cadenas vacías en SQL
            'ci_dni' => [
                'required',
                'string',
                'max:50',
                Rule::unique('solicitantes', 'ci_dni')->ignore($solicitanteId),
            ],
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string',
            'tipo_vivienda' => 'required|string|max:100',
            'tiene_mascotas_actuales' => 'nullable|boolean',
        ];
    }
}

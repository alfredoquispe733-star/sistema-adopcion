<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TratamientoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mascota_id' => 'required|exists:mascotas,id',
            'doctor_id' => 'required|exists:doctores,id',
            'tipo_registro' => 'required|string|max:50',
            'estado_tratamiento' => 'required|string|max:50',
            'diagnostico_enfermedad' => 'nullable|string',
            'tratamiento_procedimiento' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'observaciones' => 'nullable|string',
        ];
    }

    /**
     * Limpia las entradas opcionales antes de validar para evitar problemas con PostgreSQL
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'fecha_fin' => $this->fecha_fin ?: null,
            'diagnostico_enfermedad' => $this->diagnostico_enfermedad ?: null,
            'tratamiento_procedimiento' => $this->tratamiento_procedimiento ?: null,
            'observaciones' => $this->observaciones ?: null,
        ]);
    }
}

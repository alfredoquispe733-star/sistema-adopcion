<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorialVacunaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mascota_id' => 'required|integer|exists:mascotas,id',
            'tipo' => 'required|string|in:Vacuna,Desparasitante',
            'nombre_producto' => 'required|string|max:100',
            'fecha_aplicacion' => 'required|date',
            'fecha_proxima_dosis' => 'nullable|date',
            'doctor_id' => 'required|integer|exists:doctores,id',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'fecha_proxima_dosis' => $this->fecha_proxima_dosis ?: null,
        ]);
    }

    public function attributes(): array
    {
        return [
            'mascota_id' => 'mascota',
            'tipo' => 'tipo',
            'nombre_producto' => 'nombre del producto',
            'fecha_aplicacion' => 'fecha de aplicación',
            'fecha_proxima_dosis' => 'fecha de próxima dosis',
            'doctor_id' => 'doctor',
        ];
    }
}

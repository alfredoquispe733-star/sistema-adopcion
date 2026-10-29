<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'donante_nombre' => 'required|string|max:100',
            'donante_identificacion' => 'nullable|string|max:20',
            'tipo_donacion' => 'required|string|in:Monetaria,Insumos,Medicamentos,Alimentos,Equipos,Otros',
            'monto' => 'nullable|numeric|min:0',
            'descripcion_insumos' => 'nullable|string',
            'fecha' => 'required|date',
        ];
    }

    public function attributes(): array
    {
        return [
            'donante_nombre' => 'nombre del donante',
            'donante_identificacion' => 'identificación',
            'tipo_donacion' => 'tipo de donación',
            'monto' => 'monto',
            'descripcion_insumos' => 'descripción de insumos',
            'fecha' => 'fecha',
        ];
    }
}

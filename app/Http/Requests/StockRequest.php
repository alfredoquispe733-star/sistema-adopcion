<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_item' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:100',
            'cantidad_disponible' => 'required|integer|min:0',
            'cantidad_minima' => 'nullable|integer|min:0',
            'unidad_medida' => 'nullable|string|max:50',
            'estado_stock' => 'required|string|max:50',
            'precio_unitario' => 'nullable|numeric|min:0',
            'fecha_vencimiento' => 'nullable|date',
            'observaciones' => 'nullable|string',
        ];
    }
}

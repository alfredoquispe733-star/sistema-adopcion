<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raza' => 'required|string|max:100',
            'edad_aproximada' => 'required|integer|min:0',
            'sexo' => 'required|in:Macho,Hembra',
            'estado' => 'required|in:disponible,en proceso,adoptada',
            'tamano' => 'nullable|string|max:50',
            'nivel_energia' => 'nullable|string|max:50',
            'es_esterilizado' => 'nullable|boolean',
            'fecha_ingreso' => 'nullable|date',
            'sociable_con_perros' => 'nullable|boolean',
            'sociable_con_gatos' => 'nullable|boolean',
            'sociable_con_ninos' => 'nullable|boolean',
            'historia_origen' => 'nullable|string',
            'imagen' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Asigna un valor por defecto de 0 si el campo edad_aproximada se envía vacío
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'edad_aproximada' => $this->edad_aproximada ?? 0,
            'es_esterilizado' => $this->boolean('es_esterilizado'),
            'sociable_con_perros' => $this->boolean('sociable_con_perros'),
            'sociable_con_gatos' => $this->boolean('sociable_con_gatos'),
            'sociable_con_ninos' => $this->boolean('sociable_con_ninos'),
        ]);
    }
}

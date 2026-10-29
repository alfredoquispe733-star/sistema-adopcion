<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $doctor = $this->route('doctor');
        $doctorId = is_object($doctor) ? $doctor->id : $doctor;

        return [
            'nombre' => 'required|string|max:255',
            'especialidad' => 'nullable|string|max:100',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('doctores', 'email')->ignore($doctorId),
            ],
            'telefono' => 'nullable|string|max:50',
            'colegiatura' => 'nullable|string|max:100',
        ];
    }
}

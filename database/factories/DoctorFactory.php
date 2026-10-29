<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'especialidad' => fake()->randomElement(['Medicina General', 'Cirugía', 'Dermatología', 'Oftalmología', 'Cardiología', 'Neurología', 'Oncología']),
            'telefono' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'colegiatura' => fake()->unique()->numerify('CO####'),
        ];
    }
}

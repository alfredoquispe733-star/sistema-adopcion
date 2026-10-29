<?php

namespace Database\Factories;

use App\Models\HistorialVacuna;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialVacunaFactory extends Factory
{
    protected $model = HistorialVacuna::class;

    public function definition(): array
    {
        return [
            'mascota_id' => fake()->numberBetween(1, 50),
            'tipo' => fake()->randomElement(['Vacuna', 'Desparasitante']),
            'nombre_producto' => fake()->randomElement(['Rabia', 'Quíntuple', 'Triple Felina', 'Parvovirus', 'Drontal', 'Milbemax', 'Bravecto', 'NexGard']),
            'fecha_aplicacion' => fake()->date(),
            'fecha_proxima_dosis' => fake()->optional(0.4)->date(),
            'doctor_id' => fake()->numberBetween(1, 20),
        ];
    }
}

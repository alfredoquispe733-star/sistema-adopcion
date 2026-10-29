<?php

namespace Database\Factories;

use App\Models\SeguimientoAdopcion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeguimientoAdopcionFactory extends Factory
{
    protected $model = SeguimientoAdopcion::class;

    public function definition(): array
    {
        return [
            'solicitud_id' => fake()->numberBetween(1, 30),
            'visitador_id' => fake()->numberBetween(1, 15),
            'fecha_visita' => fake()->date(),
            'estado_mascota' => fake()->randomElement(['Bien', 'En observaci', 'Requiere atenci', 'Recuperaci', 'Estable']),
            'observaciones' => fake()->optional(0.7)->sentence(),
            'fotografia_evidencia' => fake()->optional(0.3)->imageUrl(400, 300, 'animals', true),
        ];
    }
}

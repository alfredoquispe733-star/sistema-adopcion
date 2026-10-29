<?php

namespace Database\Factories;

use App\Models\Solicitante;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitanteFactory extends Factory
{
    protected $model = Solicitante::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellido' => fake()->lastName(),
            'ci_dni' => fake()->unique()->numerify('########'),
            'email' => fake()->unique()->safeEmail(),
            'telefono' => fake()->phoneNumber(),
            'direccion' => fake()->address(),
            'tipo_vivienda' => fake()->randomElement(['Casa', 'Departamento', 'Finca']),
            'tiene_mascotas_actuales' => fake()->boolean(30),
        ];
    }
}

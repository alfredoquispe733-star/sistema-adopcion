<?php

namespace Database\Factories;

use App\Models\Donacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonacionFactory extends Factory
{
    protected $model = Donacion::class;

    public function definition(): array
    {
        $tipo = fake()->randomElement(['Monetaria', 'Insumos', 'Medicamentos', 'Alimentos', 'Equipos', 'Otros']);

        return [
            'donante_nombre' => fake()->name(),
            'donante_identificacion' => fake()->optional(0.7)->numerify('##########'),
            'tipo_donacion' => $tipo,
            'monto' => $tipo === 'Monetaria' ? fake()->randomFloat(2, 10, 5000) : null,
            'descripcion_insumos' => fake()->optional(0.8)->sentence(),
            'fecha' => fake()->date(),
        ];
    }
}

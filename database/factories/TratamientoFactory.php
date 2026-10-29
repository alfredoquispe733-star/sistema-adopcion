<?php

namespace Database\Factories;

use App\Models\Tratamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TratamientoFactory extends Factory
{
    protected $model = Tratamiento::class;

    public function definition(): array
    {
        return [
            'mascota_id' => fake()->numberBetween(1, 50),
            'doctor_id' => fake()->numberBetween(1, 20),
            'stock_id' => fake()->optional(0.5)->numberBetween(1, 30),
            'tipo_registro' => fake()->randomElement(['consulta', 'vacunacion', 'cirugia', 'tratamiento', 'control']),
            'diagnostico_enfermedad' => fake()->optional(0.7)->sentence(),
            'tratamiento_procedimiento' => fake()->optional(0.8)->paragraph(),
            'nombre_vacuna' => fake()->optional(0.3)->randomElement(['Rabia', 'Quíntuple', 'Triple Felina', 'Parvovirus', 'Moquillo', 'Bordetella']),
            'fecha_proximo_refuerzo' => fake()->optional(0.4)->dateTimeBetween('now', '+1 year'),
            'fecha_inicio' => fake()->dateTimeBetween('-1 year', 'now'),
            'fecha_fin' => fake()->optional(0.5)->dateTimeBetween('now', '+6 months'),
            'estado_tratamiento' => fake()->randomElement(['activo', 'completado', 'suspendido', 'cancelado']),
            'observaciones' => fake()->optional(0.4)->sentence(),
        ];
    }
}

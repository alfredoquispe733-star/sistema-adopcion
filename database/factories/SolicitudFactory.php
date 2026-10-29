<?php

namespace Database\Factories;

use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudFactory extends Factory
{
    protected $model = Solicitud::class;

    public function definition(): array
    {
        return [
            'solicitante_id' => fake()->numberBetween(1, 30),
            'mascota_id' => fake()->numberBetween(1, 50),
            'tipo_vivienda' => fake()->randomElement(['Casa', 'Departamento', 'Finca']),
            'experiencia_previa' => fake()->sentence(),
            'estado' => fake()->randomElement(['pendiente', 'en evaluacion', 'aprobada', 'rechazada']),
            'tiene_mascotas_actuales' => fake()->boolean(30),
            'todos_de_acuerdo' => fake()->boolean(85),
            'presupuesto_estimado_mensual' => fake()->optional(0.7)->randomFloat(2, 50, 500),
            'motivo_adopcion' => fake()->optional(0.9)->sentence(),
            'observacion_admin' => fake()->optional(0.4)->sentence(),
        ];
    }
}

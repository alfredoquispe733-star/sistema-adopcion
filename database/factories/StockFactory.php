<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    protected $model = Stock::class;

    public function definition(): array
    {
        return [
            'nombre_item' => fake()->word(),
            'categoria' => fake()->randomElement(['Medicamentos', 'Alimentos', 'Insumos Médicos', 'Material Limpieza', 'Equipos', 'Otros']),
            'cantidad_disponible' => fake()->numberBetween(0, 500),
            'cantidad_minima' => fake()->numberBetween(1, 20),
            'unidad_medida' => fake()->randomElement(['unidades', 'cajas', 'kg', 'ml', 'litros']),
            'estado_stock' => fake()->randomElement(['buen_estado', 'bajo_stock', 'agotado', 'reservado']),
            'precio_unitario' => fake()->randomFloat(2, 1, 500),
            'fecha_vencimiento' => fake()->optional(0.3)->dateTimeBetween('now', '+2 years'),
            'observaciones' => fake()->optional(0.3)->sentence(),
        ];
    }
}

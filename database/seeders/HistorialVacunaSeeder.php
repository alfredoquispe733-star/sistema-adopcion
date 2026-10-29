<?php

namespace Database\Seeders;

use App\Models\HistorialVacuna;
use Illuminate\Database\Seeder;

class HistorialVacunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear historiales vacunales usando firstOrCreate por mascota y tipo
        HistorialVacuna::firstOrCreate(
            ['mascota_id' => 1, 'tipo' => 'Vacuna'],
            [
                'nombre_producto' => 'Vacuna antirrábica',
                'fecha_aplicacion' => now(),
                'fecha_proxima_dosis' => now()->addMonth(),
                'doctor_id' => 1,
            ]
        );

        HistorialVacuna::firstOrCreate(
            ['mascota_id' => 2, 'tipo' => 'Desparasitante'],
            [
                'nombre_producto' => 'Desparasitado con pipeta externa',
                'fecha_aplicacion' => now()->subMonth(),
                'fecha_proxima_dosis' => now(),
                'doctor_id' => 2,
            ]
        );

        // Historiales adicionales en lote
        $tipos = ['Vacuna', 'Desparasitante'];

        for ($i = 3; $i <= 8; $i++) {
            HistorialVacuna::firstOrCreate(
                ['mascota_id' => $i, 'tipo' => $tipos[array_rand($tipos)]],
                [
                    'nombre_producto' => 'Producto veterinario genérico',
                    'fecha_aplicacion' => now()->subDays(rand(1, 90)),
                    'fecha_proxima_dosis' => now()->addDays(rand(1, 60)),
                    'doctor_id' => rand(1, 2),
                ]
            );
        }
    }
}

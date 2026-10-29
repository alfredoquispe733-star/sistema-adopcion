<?php

namespace Database\Seeders;

use App\Models\Donacion;
use Illuminate\Database\Seeder;

class DonacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear donaciones usando firstOrCreate por donante_identificacion
        Donacion::firstOrCreate(
            ['donante_identificacion' => '12345678-9'],
            [
                'donante_nombre' => 'Donante Test',
                'tipo_donacion' => 'Monetaria',
                'monto' => 100.00,
                'fecha' => now(),
                'descripcion_insumos' => 'Donación espontánea',
            ]
        );

        Donacion::firstOrCreate(
            ['donante_identificacion' => '98765432-1'],
            [
                'donante_nombre' => 'Empresa Test',
                'tipo_donacion' => 'Insumos',
                'monto' => 500.00,
                'fecha' => now()->subMonth(),
                'descripcion_insumos' => 'Donación de insumos veterinarios',
            ]
        );

        // Donaciones adicionales en lote
        $tipos = ['Monetaria', 'Insumos', 'Medicamentos', 'Alimentos'];
        $montos = [200.00, 300.00, 150.00, 400.00];

        for ($i = 3; $i <= 8; $i++) {
            Donacion::firstOrCreate(
                ['donante_identificacion' => "ID-{$i}"],
                [
                    'donante_nombre' => "Donante #{$i}",
                    'tipo_donacion' => $tipos[array_rand($tipos)],
                    'monto' => rand(50, 1000) / 100 * 100, // múltiplos de 100
                    'fecha' => now()->subDays(rand(1, 365)),
                    'descripcion_insumos' => "Donación programada #{$i}",
                ]
            );
        }
    }
}

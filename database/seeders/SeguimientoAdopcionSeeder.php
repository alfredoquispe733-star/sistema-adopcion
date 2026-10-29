<?php

namespace Database\Seeders;

use App\Models\SeguimientoAdopcion;
use App\Models\User;
use Illuminate\Database\Seeder;

class SeguimientoAdopcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear seguimientos usando firstOrCreate por solicitud
        SeguimientoAdopcion::firstOrCreate(
            ['solicitud_id' => 1, 'visitador_id' => 1],
            [
                'fecha_visita' => now(),
                'estado_mascota' => 'Bien',
                'observaciones' => 'Visita inicial, mascota en buen estado. Paseo, alimentación, evaluación comportamental.',
            ]
        );

        SeguimientoAdopcion::firstOrCreate(
            ['solicitud_id' => 2, 'visitador_id' => 2],
            [
                'fecha_visita' => now()->subWeek(),
                'estado_mascota' => 'En observación',
                'observaciones' => 'Se detectó pérdida de peso leve. Control de peso, ajuste de dieta recomendado.',
            ]
        );

        // Seguimientos adicionales en lote
        $visitantes = User::pluck('id')->toArray();
        $solicitudes = [1, 2, 3, 4, 5];
        $estados = ['Bien', 'En observación', 'Requiere atención'];

        for ($i = 3; $i <= 10; $i++) {
            SeguimientoAdopcion::firstOrCreate(
                ['solicitud_id' => $solicitudes[array_rand($solicitudes)], 'visitador_id' => $visitantes[array_rand($visitantes)]],
                [
                    'fecha_visita' => now()->subDays(rand(1, 30)),
                    'estado_mascota' => $estados[array_rand($estados)],
                    'observaciones' => 'Hallazgo '.rand(1, 10).'. Acción '.rand(1, 5).'.',
                ]
            );
        }
    }
}

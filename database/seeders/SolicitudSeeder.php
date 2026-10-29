<?php

namespace Database\Seeders;

use App\Models\Solicitud;
use App\Models\Solicitante;
use App\Models\Mascota;
use Illuminate\Database\Seeder;

class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Obtener los IDs reales disponibles en la base de datos
        $solicitantesIds = Solicitante::pluck('id')->toArray();
        $mascotasIds = Mascota::pluck('id')->toArray();

        // Si no hay solicitantes o mascotas suficientes, evitamos errores
        if (empty($solicitantesIds) || empty($mascotasIds)) {
            return;
        }

        // 2. Crear solicitudes fijas seguras usando el primer ID disponible
        $primerSolicitante = $solicitantesIds[0];
        $segundoSolicitante = $solicitantesIds[1] ?? $primerSolicitante;

        $primeraMascota = $mascotasIds[0] ?? 1;
        $segundaMascota = $mascotasIds[1] ?? $primeraMascota;

        Solicitud::firstOrCreate(
            ['mascota_id' => $primeraMascota, 'solicitante_id' => $primerSolicitante],
            [
                'tipo_vivienda' => 'Casa',
                'experiencia_previa' => 'Experiencia previa con perros',
                'estado' => 'pendiente',
                'motivo_adopcion' => 'Familia interesada en adoptar un perro adulto',
            ]
        );

        Solicitud::firstOrCreate(
            ['mascota_id' => $segundaMascota, 'solicitante_id' => $segundoSolicitante],
            [
                'tipo_vivienda' => 'Departamento',
                'experiencia_previa' => 'Primera vez con mascotas',
                'estado' => 'aprobada',
                'motivo_adopcion' => 'Buscando hogar para gato siamés',
            ]
        );

        // 3. Solicitudes adicionales en lote dinámicas basadas en los registros reales
        $estados = ['pendiente', 'en evaluacion', 'aprobada', 'rechazada'];
        $tiposVivienda = ['Casa', 'Departamento', 'Finca'];
        $motivos = [
            'Buscando hogar para mascota familiar',
            'Desea dar un segundo chance a un animal',
            'Interesado en adopción responsable',
            'Familia con niños pequeños',
        ];

        // Recorremos las mascotas disponibles de forma segura
        foreach ($mascotasIds as $index => $mascotaId) {
            // Omitimos las dos primeras si ya las usamos arriba, o dejamos que corran
            if ($index < 2) continue;

            Solicitud::firstOrCreate(
                [
                    'mascota_id' => $mascotaId, 
                    'solicitante_id' => $solicitantesIds[array_rand($solicitantesIds)]
                ],
                [
                    'tipo_vivienda' => $tiposVivienda[array_rand($tiposVivienda)],
                    'experiencia_previa' => 'Experiencia ' . rand(1, 5),
                    'estado' => $estados[array_rand($estados)],
                    'motivo_adopcion' => $motivos[array_rand($motivos)],
                ]
            );
        }
    }
}
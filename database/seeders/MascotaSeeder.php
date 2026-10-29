<?php

namespace Database\Seeders;

use App\Models\Mascota;
use Illuminate\Database\Seeder;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear mascotas usando firstOrCreate por nombre y especie
        Mascota::firstOrCreate(
            ['nombre' => 'Nayeli', 'especie' => 'Gato'],
            [
                'raza' => 'Mestizo',
                'edad_aproximada' => 5,
                'sexo' => 'Hembra',
                'fotografia' => 'mascotas/mascota-1.jpg',
                'estado' => 'disponible',
            ]
        );

        Mascota::firstOrCreate(
            ['nombre' => 'Torrance', 'especie' => 'Gato'],
            [
                'raza' => 'Siamés',
                'edad_aproximada' => 3,
                'sexo' => 'Hembra',
                'fotografia' => 'mascotas/mascota-2.jpg',
                'estado' => 'disponible',
            ]
        );

        Mascota::firstOrCreate(
            ['nombre' => 'Alexandra', 'especie' => 'Gato'],
            [
                'raza' => 'Persa',
                'edad_aproximada' => 11,
                'sexo' => 'Macho',
                'fotografia' => 'mascotas/mascota-3.jpg',
                'estado' => 'en proceso',
            ]
        );

        Mascota::firstOrCreate(
            ['nombre' => 'Skyla', 'especie' => 'Perro'],
            [
                'raza' => 'Poodle',
                'edad_aproximada' => 4,
                'sexo' => 'Hembra',
                'fotografia' => 'mascotas/mascota-4.jpg',
                'estado' => 'disponible',
            ]
        );

        Mascota::firstOrCreate(
            ['nombre' => 'Ben', 'especie' => 'Perro'],
            [
                'raza' => 'Beagle',
                'edad_aproximada' => 5,
                'sexo' => 'Hembra',
                'fotografia' => 'mascotas/mascota-5.jpg',
                'estado' => 'disponible',
            ]
        );

        // Mascotas adicionales usando un ciclo para evitar repetición
        $especies = ['Perro', 'Gato'];
        $razasPerro = ['Labrador', 'Pastor Alemán', 'Mestizo', 'Poodle', 'Beagle'];
        $razasGato = ['Siamés', 'Persa', 'Mestizo', 'Angora'];

        for ($i = 1; $i <= 30; $i++) {
            $especie = $especies[array_rand($especies)];
            $raza = $especie === 'Perro' ? $razasPerro[array_rand($razasPerro)] : $razasGato[array_rand($razasGato)];
            $numero = $i + 5; // IDs del 6 al 35

            Mascota::firstOrCreate(
                ['nombre' => "Mascota #{$numero}", 'especie' => $especie],
                [
                    'raza' => $raza,
                    'edad_aproximada' => rand(1, 12),
                    'sexo' => rand(0, 1) ? 'Macho' : 'Hembra',
                    'fotografia' => "mascotas/mascota-{$numero}.jpg",
                    'estado' => rand(0, 1) ? 'disponible' : 'adoptada',
                ]
            );
        }
    }
}

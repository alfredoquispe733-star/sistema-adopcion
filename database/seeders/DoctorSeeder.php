<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear doctores usando firstOrCreate por colegiatura
        Doctor::firstOrCreate(
            ['colegiatura' => '12345-A'],
            [
                'nombre' => 'Dr. Juan Pérez',
                'especialidad' => 'Medicina General',
                'email' => 'juan.perez@refugio.com',
            ]
        );

        Doctor::firstOrCreate(
            ['colegiatura' => '67890-B'],
            [
                'nombre' => 'Dra. María Gómez',
                'especialidad' => 'Pediatría',
                'email' => 'maria.gomez@refugio.com',
            ]
        );
    }
}

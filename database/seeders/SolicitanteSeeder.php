<?php

namespace Database\Seeders;

use App\Models\Solicitante;
use Illuminate\Database\Seeder;

class SolicitanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear solicitantes usando firstOrCreate por CI/DNI
        Solicitante::firstOrCreate(
            ['ci_dni' => '12345678-9'],
            [
                'nombre' => 'Ana María',
                'apellido' => 'Gómez',
                'email' => 'ana.gomez@refugio.com',
                'telefono' => '312-456-7890',
                'direccion' => 'Calle Falsa 123, Ciudad',
                'tipo_vivienda' => 'Departamento',
            ]
        );

        Solicitante::firstOrCreate(
            ['ci_dni' => '98765432-1'],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Rodríguez',
                'email' => 'carlos.rodriguez@refugio.com',
                'telefono' => '320-987-6543',
                'direccion' => 'Av. Siempre Viva 456, Ciudad',
                'tipo_vivienda' => 'Casa',
            ]
        );
    }
}

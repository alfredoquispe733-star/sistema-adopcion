<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear usuarios (base para autenticación y roles)
        $this->call(UserSeeder::class);

        // 2. Crear doctores (médicos veterinarios)
        $this->call(DoctorSeeder::class);

        // 3. Crear solicitantes (deben existir antes de que se creen las solicitudes)
        $this->call(SolicitanteSeeder::class);

        // 4. Crear mascotas (deben existir antes de tratamientos, historiales y solicitudes)
        $this->call(MascotaSeeder::class);

        // 5. Crear stock (inventario de la clínica/refugio, independiente)
        Stock::factory(20)->create();

        // 6. Crear tratamientos (relacionados con mascotas y doctores)
        $this->call(TratamientoSeeder::class);

        // 7. Historial vacunal (relacionado con mascotas y doctores)
        $this->call(HistorialVacunaSeeder::class);

        // 8. Solicitudes (dependen de solicitantes y mascotas ya creados)
        $this->call(SolicitudSeeder::class);

        // 9. Seguimientos de adopción (dependen de las solicitudes y usuarios/visitadores)
        $this->call(SeguimientoAdopcionSeeder::class);

        // 10. Donaciones
        $this->call(DonacionSeeder::class);
    }
}
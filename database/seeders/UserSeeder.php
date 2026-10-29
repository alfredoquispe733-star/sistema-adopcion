<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios usando firstOrCreate para evitar duplicados por email
        User::firstOrCreate(
            ['email' => 'admin@refugio.com'],
            [
                'name' => 'Admin Principal',
                'password' => bcrypt('password'),
                'rol' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'staff@refugio.com'],
            [
                'name' => 'Personal de Refugio',
                'password' => bcrypt('password123'),
                'rol' => 'administrativo',
            ]
        );
    }
}

<?php

namespace Tests\Feature;

use App\Models\HistorialVacuna;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HistorialVacunaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_historial_vacuna(): void
    {
        $historial = HistorialVacuna::factory()->create(['nombre_producto' => 'Rabia']);

        $this->assertDatabaseHas('historial_vacunas', [
            'nombre_producto' => 'Rabia',
        ]);
    }
}

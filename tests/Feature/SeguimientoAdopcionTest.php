<?php

namespace Tests\Feature;

use App\Models\SeguimientoAdopcion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeguimientoAdopcionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_seguimiento(): void
    {
        $seguimiento = SeguimientoAdopcion::factory()->create([
            'estado_mascota' => 'Bien',
        ]);

        $this->assertDatabaseHas('seguimientos_adopcion', [
            'estado_mascota' => 'Bien',
        ]);
    }
}

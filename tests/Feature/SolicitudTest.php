<?php

namespace Tests\Feature;

use App\Models\Solicitud;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SolicitudTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_solicitud(): void
    {
        $solicitud = Solicitud::factory()->create([
            'tipo_vivienda' => 'Casa',
            'estado' => 'pendiente',
        ]);

        $this->assertDatabaseHas('solicitudes', [
            'tipo_vivienda' => 'Casa',
            'estado' => 'pendiente',
        ]);
    }
}

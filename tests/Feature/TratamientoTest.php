<?php

namespace Tests\Feature;

use App\Models\Tratamiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TratamientoTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_tratamiento(): void
    {
        $tratamiento = Tratamiento::factory()->create([
            'tipo_registro' => 'consulta',
            'diagnostico_enfermedad' => 'Gripe',
        ]);

        $this->assertDatabaseHas('tratamientos', [
            'tipo_registro' => 'consulta',
            'diagnostico_enfermedad' => 'Gripe',
        ]);
    }
}

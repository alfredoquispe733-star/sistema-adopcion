<?php

namespace Tests\Feature;

use App\Models\Solicitante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SolicitanteTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_solicitante(): void
    {
        $solicitante = Solicitante::factory()->create([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'ci_dni' => '12345678',
        ]);

        $this->assertDatabaseHas('solicitantes', [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'ci_dni' => '12345678',
        ]);
    }

    public function test_solicitante_has_ci_dni(): void
    {
        $solicitante = Solicitante::factory()->create(['ci_dni' => '87654321']);

        $this->assertEquals('87654321', $solicitante->ci_dni);
    }

    public function test_solicitante_can_be_updated(): void
    {
        $solicitante = Solicitante::factory()->create(['nombre' => 'Original']);

        $solicitante->update(['nombre' => 'Actualizado']);

        $this->assertEquals('Actualizado', $solicitante->fresh()->nombre);
    }

    public function test_solicitante_can_be_deleted(): void
    {
        $solicitante = Solicitante::factory()->create();
        $solicitanteId = $solicitante->id;

        $solicitante->delete();

        $this->assertDatabaseMissing('solicitantes', ['id' => $solicitanteId]);
    }

    public function test_solicitante_has_solicitudes_relationship(): void
    {
        $solicitante = Solicitante::factory()->create();
        $solicitudes = $solicitante->solicitudes()->count();

        $this->assertIsInt($solicitudes);
    }
}

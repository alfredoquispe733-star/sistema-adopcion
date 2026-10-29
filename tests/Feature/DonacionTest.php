<?php

namespace Tests\Feature;

use App\Models\Donacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonacionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_donacion(): void
    {
        $donacion = Donacion::factory()->create([
            'donante_nombre' => 'Carlos Gomez',
            'tipo_donacion' => 'Monetaria',
            'monto' => 500.00,
        ]);

        $this->assertDatabaseHas('donaciones', [
            'donante_nombre' => 'Carlos Gomez',
            'tipo_donacion' => 'Monetaria',
            'monto' => 500.00,
        ]);
    }

    public function test_donacion_has_tipo_donacion(): void
    {
        $donacion = Donacion::factory()->create(['tipo_donacion' => 'Alimentos']);

        $this->assertEquals('Alimentos', $donacion->tipo_donacion);
    }

    public function test_donacion_can_be_updated(): void
    {
        $donacion = Donacion::factory()->create(['donante_nombre' => 'Original']);

        $donacion->update(['donante_nombre' => 'Actualizado']);

        $this->assertEquals('Actualizado', $donacion->fresh()->donante_nombre);
    }

    public function test_donacion_can_be_deleted(): void
    {
        $donacion = Donacion::factory()->create();
        $donacionId = $donacion->id;

        $donacion->delete();

        $this->assertDatabaseMissing('donaciones', ['id' => $donacionId]);
    }
}

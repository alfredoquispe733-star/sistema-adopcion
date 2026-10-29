<?php

namespace Tests\Feature;

use App\Models\Mascota;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MascotaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_mascota(): void
    {
        $mascota = Mascota::factory()->create([
            'nombre' => 'Rex',
            'especie' => 'Perro',
            'raza' => 'Labrador',
        ]);

        $this->assertDatabaseHas('mascotas', [
            'nombre' => 'Rex',
            'especie' => 'Perro',
        ]);
    }

    public function test_mascota_has_especie(): void
    {
        $mascota = Mascota::factory()->create(['especie' => 'Gato']);

        $this->assertEquals('Gato', $mascota->especie);
    }

    public function test_mascota_can_be_updated(): void
    {
        $mascota = Mascota::factory()->create(['nombre' => 'Original']);

        $mascota->update(['nombre' => 'Actualizado']);

        $this->assertEquals('Actualizado', $mascota->fresh()->nombre);
    }

    public function test_mascota_can_be_deleted(): void
    {
        $mascota = Mascota::factory()->create();
        $mascotaId = $mascota->id;

        $mascota->delete();

        $this->assertDatabaseMissing('mascotas', ['id' => $mascotaId]);
    }

    public function test_mascota_has_tratamientos_relationship(): void
    {
        $mascota = Mascota::factory()->create();
        $tratamientos = $mascota->tratamientos()->count();

        $this->assertIsInt($tratamientos);
    }

    public function test_mascota_has_solicitudes_relationship(): void
    {
        $mascota = Mascota::factory()->create();
        $solicitudes = $mascota->solicitudes()->count();

        $this->assertIsInt($solicitudes);
    }

    public function test_mascota_has_historial_vacunas_relationship(): void
    {
        $mascota = Mascota::factory()->create();
        $vacunas = $mascota->historialVacunas()->count();

        $this->assertIsInt($vacunas);
    }
}

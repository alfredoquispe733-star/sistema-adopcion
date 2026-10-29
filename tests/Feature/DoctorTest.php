<?php

namespace Tests\Feature;

use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DoctorTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_doctor(): void
    {
        $doctor = Doctor::factory()->create([
            'nombre' => 'Dr. Juan Perez',
            'especialidad' => 'Cirugia',
        ]);

        $this->assertDatabaseHas('doctores', [
            'nombre' => 'Dr. Juan Perez',
            'especialidad' => 'Cirugia',
        ]);
    }

    public function test_doctor_has_especialidad(): void
    {
        $doctor = Doctor::factory()->create(['especialidad' => 'Cardiologia']);

        $this->assertEquals('Cardiologia', $doctor->especialidad);
    }

    public function test_doctor_can_be_updated(): void
    {
        $doctor = Doctor::factory()->create(['nombre' => 'Dr. Original']);

        $doctor->update(['nombre' => 'Dr. Actualizado']);

        $this->assertEquals('Dr. Actualizado', $doctor->fresh()->nombre);
    }

    public function test_doctor_can_be_deleted(): void
    {
        $doctor = Doctor::factory()->create();
        $doctorId = $doctor->id;

        $doctor->delete();

        $this->assertDatabaseMissing('doctores', ['id' => $doctorId]);
    }

    public function test_doctor_has_tratamientos_relationship(): void
    {
        $doctor = Doctor::factory()->create();
        $tratamientos = $doctor->tratamientos()->count();

        $this->assertIsInt($tratamientos);
    }
}

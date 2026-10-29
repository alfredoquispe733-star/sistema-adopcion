<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_vacunas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')
                ->constrained('mascotas')
                ->onDelete('cascade');
            $table->enum('tipo', ['Vacuna', 'Desparasitante'])->default('Vacuna');
            $table->string('nombre_producto');
            $table->date('fecha_aplicacion');
            $table->date('fecha_proxima_dosis')->nullable();
            $table->foreignId('doctor_id')
                ->constrained('doctores')
                ->onDelete('restrict');
            $table->timestamps();

            $table->index(['mascota_id', 'fecha_aplicacion']);
            $table->index(['doctor_id', 'fecha_aplicacion']);
            $table->index('fecha_proxima_dosis');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_vacunas');
    }
};

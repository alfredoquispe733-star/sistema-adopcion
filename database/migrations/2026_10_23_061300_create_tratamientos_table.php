<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')
                ->constrained('mascotas')
                ->onDelete('cascade');
            $table->foreignId('doctor_id')
                ->constrained('doctores')
                ->onDelete('restrict');
            $table->foreignId('stock_id')
                ->nullable()
                ->constrained('stock')
                ->onDelete('set null');
            $table->enum('tipo_registro', ['consulta', 'vacunacion', 'cirugia', 'tratamiento', 'control'])->default('consulta');
            $table->string('diagnostico_enfermedad')->nullable();
            $table->text('tratamiento_procedimiento')->nullable();
            $table->string('nombre_vacuna')->nullable();
            $table->date('fecha_proximo_refuerzo')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado_tratamiento', ['activo', 'completado', 'suspendido', 'cancelado'])->default('activo');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->index(['mascota_id', 'fecha_inicio']);
            $table->index(['doctor_id', 'fecha_inicio']);
            $table->index(['estado_tratamiento']);
            $table->index('fecha_proximo_refuerzo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tratamientos');
    }
};

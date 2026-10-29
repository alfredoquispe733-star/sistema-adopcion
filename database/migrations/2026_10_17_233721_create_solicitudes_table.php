<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitante_id')
                ->constrained('solicitantes')
                ->onDelete('cascade');
            $table->foreignId('mascota_id')
                ->constrained('mascotas')
                ->onDelete('cascade');
            $table->string('tipo_vivienda');
            $table->text('experiencia_previa');
            $table->enum('estado', ['pendiente', 'en evaluacion', 'aprobada', 'rechazada'])
                ->default('pendiente');
            $table->text('observacion_admin')->nullable();
            $table->boolean('tiene_mascotas_actuales')->default(false);
            $table->boolean('todos_de_acuerdo')->default(true);
            $table->decimal('presupuesto_estimado_mensual', 10, 2)->nullable();
            $table->text('motivo_adopcion')->nullable();
            $table->timestamps();

            $table->index(['solicitante_id', 'estado']);
            $table->index(['mascota_id', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};

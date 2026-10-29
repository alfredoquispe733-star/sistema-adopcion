<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seguimientos_adopcion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_id')
                ->constrained('solicitudes')
                ->onDelete('cascade');
            $table->date('fecha_visita');
            $table->string('estado_mascota'); // ej: 'Bien', 'En observación', 'Requiere atención'
            $table->text('observaciones')->nullable();
            $table->string('fotografia_evidencia')->nullable();
            $table->foreignId('visitador_id')
                ->constrained('users') // Puede ser personal del refugio o doctores
                ->onDelete('restrict');
            $table->timestamps();

            $table->index(['solicitud_id', 'fecha_visita']);
            $table->index('visitador_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seguimientos_adopcion');
    }
};

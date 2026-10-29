<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->string('donante_nombre');
            $table->string('donante_identificacion')->nullable(); // CI/DNI o RUC
            $table->enum('tipo_donacion', ['Monetaria', 'Insumos', 'Medicamentos', 'Alimentos', 'Equipos', 'Otros']);
            $table->decimal('monto', 12, 2)->nullable(); // Nullable si es donación en especie
            $table->text('descripcion_insumos')->nullable(); // Descripción si es donación en especie
            $table->date('fecha');
            $table->timestamps();

            $table->index(['tipo_donacion', 'fecha']);
            $table->index('donante_identificacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};

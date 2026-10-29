<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_item', 100);
            $table->string('categoria')->nullable(); // Medicamentos, Alimentos, Insumos, etc.
            $table->integer('cantidad_disponible')->default(0);
            $table->integer('cantidad_minima')->default(5);
            $table->string('unidad_medida')->nullable(); // unidades, cajas, kg, ml, etc.
            $table->string('estado_stock')->default('buen_estado'); // buen_estado, bajo_stock, agotado, reservado
            $table->decimal('precio_unitario', 10, 2)->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->index(['categoria', 'estado_stock']);
            $table->index('fecha_vencimiento');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};

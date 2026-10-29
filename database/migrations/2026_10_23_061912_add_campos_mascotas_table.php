<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->string('tamano')->nullable()->after('raza'); // ej: Pequeño, Mediano, Grande
            $table->string('nivel_energia')->nullable()->after('tamano'); // ej: Bajo, Medio, Alto
            $table->boolean('es_esterilizado')->default(false)->after('nivel_energia');
            $table->boolean('sociable_con_perros')->default(true)->after('es_esterilizado');
            $table->boolean('sociable_con_gatos')->default(true)->after('sociable_con_perros');
            $table->boolean('sociable_con_ninos')->default(true)->after('sociable_con_gatos');
            $table->date('fecha_ingreso')->nullable()->after('sociable_con_ninos');
            $table->text('historia_origen')->nullable()->after('fecha_ingreso');
        });
    }

    public function down(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn([
                'tamano',
                'nivel_energia',
                'es_esterilizado',
                'sociable_con_perros',
                'sociable_con_gatos',
                'sociable_con_ninos',
                'fecha_ingreso',
                'historia_origen',
            ]);
        });
    }
};

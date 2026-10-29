<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donaciones'; // O el nombre real de tu tabla

    protected $fillable = [
        'donante_id',
        'tipo',
        'monto',
        'descripcion_insumos',
        'fecha',
        'observaciones',
        // Agrega aquí los campos fillable que tenga tu modelo
    ];

    /**
     * Casteo automático de atributos a tipos nativos.
     */
    protected $casts = [
        'fecha' => 'date',
    ];
}

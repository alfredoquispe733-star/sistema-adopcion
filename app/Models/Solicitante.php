<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solicitante extends Model
{
    use HasFactory;

    protected $table = 'solicitantes';

    protected $fillable = [
        'nombre',
        'apellido',
        'ci_dni',
        'email',
        'telefono',
        'direccion',
        'tipo_vivienda',
        'tiene_mascotas_actuales',
    ];

    protected $casts = [
        'tiene_mascotas_actuales' => 'boolean',
    ];

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class);
    }
}

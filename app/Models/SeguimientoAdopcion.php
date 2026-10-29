<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeguimientoAdopcion extends Model
{
    use HasFactory;

    protected $table = 'seguimientos_adopcion';

    protected $fillable = [
        'solicitud_id',
        'visitador_id',
        'fecha_visita',
        'estado_mascota',
        'observaciones',
        'fotografia_evidencia',
    ];

    /**
     * Casteo automático de atributos a tipos de datos nativos.
     */
    protected $casts = [
        'fecha_visita' => 'date',
    ];

    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function visitador(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

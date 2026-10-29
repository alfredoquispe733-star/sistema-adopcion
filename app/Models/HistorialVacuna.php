<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistorialVacuna extends Model
{
    use HasFactory;

    protected $table = 'historial_vacunas'; // Ajusta si tu tabla tiene otro nombre

    protected $fillable = [
        'mascota_id',
        'doctor_id',
        'nombre_producto',
        'fecha_aplicacion',
        'fecha_proxima_dosis',
        'observaciones',
    ];

    /**
     * Casteo automático de atributos a tipos nativos o fechas.
     */
    protected $casts = [
        'fecha_aplicacion' => 'date',
        'fecha_proxima_dosis' => 'date',
    ];

    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascota::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}

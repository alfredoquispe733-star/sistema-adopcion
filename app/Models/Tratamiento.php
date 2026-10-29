<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamientos';

    protected $fillable = [
        'mascota_id',
        'doctor_id',
        'stock_id',
        'tipo_registro',
        'diagnostico_enfermedad',
        'tratamiento_procedimiento',
        'nombre_vacuna',
        'fecha_proximo_refuerzo',
        'fecha_inicio',
        'fecha_fin',
        'estado_tratamiento',
        'observaciones',
    ];

    protected $guarded = ['user_id', 'id', 'created_at', 'updated_at'];

    // Convierte automáticamente los campos de fecha a objetos Carbon
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'fecha_proximo_refuerzo' => 'date',
    ];

    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascota::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}

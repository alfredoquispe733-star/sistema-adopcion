<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'solicitante_id',
        'mascota_id',
        'tipo_vivienda',
        'experiencia_previa',
        'estado',
        'observacion_admin',
        'tiene_mascotas_actuales',
        'todos_de_acuerdo',
        'presupuesto_estimado_mensual',
        'motivo_adopcion',
    ];

    protected $guarded = ['user_id', 'id', 'created_at', 'updated_at'];

    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(Solicitante::class, 'solicitante_id');
    }

    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascota::class);
    }
}

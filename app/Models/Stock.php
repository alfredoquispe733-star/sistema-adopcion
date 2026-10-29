<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';

    protected $fillable = [
        'nombre_item',
        'categoria',
        'cantidad_disponible',
        'cantidad_minima',
        'unidad_medida',
        'estado_stock',
        'precio_unitario',
        'fecha_vencimiento',
        'observaciones',
    ];

    protected $casts = [
        'fecha_vencimiento' => 'date', // Convierte automáticamente la fecha a formato Carbon
    ];

    public function tratamientos(): HasMany
    {
        return $this->hasMany(Tratamiento::class);
    }
}

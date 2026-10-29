<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctores';

    protected $fillable = [
        'nombre',
        'especialidad',
        'telefono',
        'email',
        'colegiatura',
    ];

    public function tratamientos(): HasMany
    {
        return $this->hasMany(Tratamiento::class);
    }

    public function historialVacunas(): HasMany
    {
        return $this->hasMany(HistorialVacuna::class);
    }
}

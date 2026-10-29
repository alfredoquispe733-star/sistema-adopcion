<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Mascota extends Model
{
    use HasFactory;
    protected $table = 'mascotas';
    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad_aproximada',
        'sexo',
        'fotografia',
        'estado',
        'tamano',
        'nivel_energia',
        'es_esterilizado',
        'fecha_ingreso',
        'sociable_con_perros',
        'sociable_con_gatos',
        'sociable_con_ninos',
        'historia_origen',
    ];
    protected $casts = [
        'edad_aproximada' => 'integer',
    ];
    protected static $defaultImages = [
        'Perro' => [
            'Labrador' => 'mascotas/perro_labrador_7.jpg',
            'Pastor Alemán' => 'mascotas/perro_pastoralemn_8.jpg',
            'Mestizo' => 'mascotas/perro_mestizo_6.jpg',
            'Poodle' => 'mascotas/perro_poodle_4.jpg',
            'Beagle' => 'mascotas/perro_beagle_5.jpg',
            'default' => 'mascotas/perro_mestizo_6.jpg',
        ],
        'Gato' => [
            'Siamés' => 'mascotas/gato_siams_2.jpg',
            'Persa' => 'mascotas/gato_persa_3.jpg',
            'Mestizo' => 'mascotas/gato_mestizo_1.jpg',
            'Angora' => 'mascotas/gato_angora_20.jpg',
            'default' => 'mascotas/gato_mestizo_1.jpg',
        ],
    ];
    public function getImageUrlAttribute(): string
    {
        $foto = $this->fotografia ?? $this->imagen ?? null;
        if ($foto && ! Str::contains($foto, 'placeholder.com')) {
            if (Str::startsWith($foto, 'http')) {
                return $foto;
            }
            return asset('storage/'.$foto);
        }
        $especie = $this->especie;
        $raza = $this->raza;
        $defaults = self::$defaultImages[$especie] ?? [];
        $defaultImage = $defaults[$raza] ?? $defaults['default'] ?? null;
        if ($defaultImage && Storage::disk('public')->exists($defaultImage)) {
            return asset('storage/'.$defaultImage);
        }

        return asset('images/default-pet.jpg');
    }
    public function getDefaultImagePath(): ?string
    {
        $defaults = self::$defaultImages[$this->especie] ?? [];

        return $defaults[$this->raza] ?? $defaults['default'] ?? null;
    }
    public function tratamientos(): HasMany
    {
        return $this->hasMany(Tratamiento::class);
    }
    public function historialVacunas(): HasMany
    {
        return $this->hasMany(HistorialVacuna::class);
    }
    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitud::class);
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Mascota;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('mascotas:assign-unique-images {--force : Forzar reasignación aunque ya tengan imagen}')]
#[Description('Asigna imágenes únicas a cada mascota desde storage/app/public/mascotas/')]
class AssignUniquePetImages extends Command
{
    public function handle()
    {
        $this->info('Iniciando asignación de imágenes únicas a mascotas...');

        $force = $this->option('force');

        $mascotas = Mascota::orderBy('id')->get();
        $total = $mascotas->count();

        $this->info("Encontradas {$total} mascotas.");

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $imagenesDisponibles = $this->obtenerImagenesDisponibles();

        if (empty($imagenesDisponibles)) {
            $this->error('No hay imágenes disponibles en storage/app/public/mascotas/');

            return 1;
        }

        $this->info("\nImágenes base disponibles: ".count($imagenesDisponibles));

        $asignadas = 0;
        $omitidas = 0;

        foreach ($mascotas as $index => $mascota) {
            // Si ya tiene imagen y no es force, omitir
            if (! $force && $mascota->fotografia && ! str_contains($mascota->fotografia, 'placeholder.com')) {
                $omitidas++;
                $bar->advance();

                continue;
            }

            // Asignar imagen única: usar índice para rotar por las imágenes disponibles
            $imagenAsignada = $imagenesDisponibles[$index % count($imagenesDisponibles)];

            // Crear copia única con nombre basado en ID de mascota
            $extension = pathinfo($imagenAsignada, PATHINFO_EXTENSION);
            $nuevoNombre = "mascota-{$mascota->id}.{$extension}";
            $rutaDestino = "mascotas/{$nuevoNombre}";
            $origenCompleto = storage_path('app/public/'.$imagenAsignada);
            $destinoCompleto = storage_path('app/public/'.$rutaDestino);

            // Copiar archivo si no existe o si force
            if (! file_exists($destinoCompleto) || $force) {
                if (file_exists($origenCompleto)) {
                    copy($origenCompleto, $destinoCompleto);
                } else {
                    $this->warn("\nArchivo origen no encontrado: {$origenCompleto}");
                }
            }

            // Actualizar BD
            $mascota->update(['fotografia' => $rutaDestino]);
            $asignadas++;
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Completado. Asignadas: {$asignadas}, Omitidas (ya tenían imagen): {$omitidas}");

        return 0;
    }

    private function obtenerImagenesDisponibles(): array
    {
        $directorio = storage_path('app/public/mascotas');
        $imagenes = [];

        if (is_dir($directorio)) {
            $archivos = scandir($directorio);
            foreach ($archivos as $archivo) {
                if (in_array(strtolower(pathinfo($archivo, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp'])) {
                    // Excluir archivos que ya son copias de mascotas (mascota-X.jpg)
                    if (! preg_match('/^mascota-\d+\.(jpg|jpeg|png|webp)$/i', $archivo)) {
                        $imagenes[] = "mascotas/{$archivo}";
                    }
                }
            }
        }

        // Ordenar para consistencia
        sort($imagenes);

        return $imagenes;
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Mascota;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

#[Signature('mascotas:download-photos {--force : Sobrescribe imágenes ya existentes}')]
#[Description('Descarga imágenes reales para cada mascota según especie y raza y actualiza fotografia')]
class DownloadMascotasPhotos extends Command
{
    protected $description = 'Descarga imágenes reales para cada mascota según especie y raza y actualiza fotografia';

    public function handle()
    {
        $this->info('Iniciando descarga de fotos para mascotas...');

        $force = $this->option('force');

        Mascota::chunkById(100, function ($mascotas) use ($force) {
            foreach ($mascotas as $mascota) {
                $this->processMascota($mascota, $force);
            }
        });

        $this->info('Proceso finalizado.');
    }

    private function processMascota(Mascota $mascota, bool $force)
    {
        // Si ya tiene ruta local y no se fuerza, saltar
        if (! $force && $mascota->fotografia && ! str_starts_with($mascota->fotografia, 'http')) {
            $this->line("  <comment>Se omite #{$mascota->id} {$mascota->nombre} - ya tiene foto local</comment>");

            return;
        }

        $imageUrl = $this->getImageUrl($mascota);
        if (! $imageUrl) {
            $this->warn("  No se pudo obtener imagen para #{$mascota->id}");

            return;
        }

        $filename = $this->generateFilename($mascota);
        $relativePath = "mascotas/{$filename}";
        $absolutePath = storage_path('app/public/'.$relativePath);

        if (file_exists($absolutePath) && ! $force) {
            $this->line("  <comment>Foto existente para #{$mascota->id}, se usa la actual</comment>");
        } else {
            $this->downloadImage($imageUrl, $relativePath);
        }

        $mascota->update(['fotografia' => $relativePath]);
        $this->info("  ✓ #{$mascota->id} {$mascota->nombre} -> {$relativePath}");
    }

    private function getImageUrl(Mascota $mascota): ?string
    {
        $especie = $mascota->especie;
        $raza = $mascota->raza;

        if (strtolower($especie) === 'perro') {
            return $this->getDogImageUrl($raza);
        }

        if (strtolower($especie) === 'gato') {
            return $this->getCatImageUrl($raza);
        }

        return null;
    }

    private function getDogImageUrl(string $raza): ?string
    {
        $map = [
            'Labrador' => 'labrador',
            'Pastor Alemán' => 'german_shepherd',
            'Mestizo' => null,
            'Poodle' => 'poodle',
            'Beagle' => 'beagle',
        ];

        $slug = $map[$raza] ?? null;

        try {
            if ($slug) {
                $res = Http::timeout(10)->get("https://dog.ceo/api/breed/{$slug}/images/random");
                if ($res->successful()) {
                    $data = $res->json();

                    return $data['message'] ?? null;
                }
            }
            // fallback random dog
            $res = Http::timeout(10)->get('https://dog.ceo/api/breeds/image/random');
            if ($res->successful()) {
                $data = $res->json();

                return $data['message'] ?? null;
            }
        } catch (\Throwable $e) {
            $this->warn('Error Dog API: '.$e->getMessage());
        }

        return null;
    }

    private function getCatImageUrl(string $raza): ?string
    {
        // Intento con TheCatAPI con búsqueda por raza
        try {
            $search = Http::timeout(10)
                ->get('https://api.thecatapi.com/v1/breeds/search', ['q' => $raza]);

            if ($search->successful()) {
                $breeds = $search->json();
                if (! empty($breeds)) {
                    $breedId = $breeds[0]['id'];
                    $imgRes = Http::timeout(10)
                        ->get('https://api.thecatapi.com/v1/images/search', ['breed_ids' => $breedId, 'limit' => 1]);
                    if ($imgRes->successful()) {
                        $images = $imgRes->json();
                        if (! empty($images) && isset($images[0]['url'])) {
                            return $images[0]['url'];
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            $this->warn('Error Cat API TheCatAPI: '.$e->getMessage());
        }

        // Fallback público sin clave: cataas
        // cataas devuelve la imagen directamente en la URL
        return 'https://cataas.com/cat';
    }

    private function generateFilename(Mascota $mascota): string
    {
        $especie = strtolower(preg_replace('/[^a-z]/i', '', $mascota->especie));
        $raza = strtolower(preg_replace('/[^a-z]/i', '', $mascota->raza));
        $raza = preg_replace('/[^a-z0-9_]/', '_', $raza);
        $ext = 'jpg';

        return "{$especie}_{$raza}_{$mascota->id}.{$ext}";
    }

    private function downloadImage(string $url, string $relativePath): void
    {
        $disk = Storage::disk('public');
        $dir = dirname($relativePath);
        $disk->makeDirectory($dir);

        $response = Http::timeout(20)->get($url);
        if (! $response->successful()) {
            throw new \RuntimeException('No se pudo descargar la imagen desde '.$url);
        }

        $disk->put($relativePath, $response->body());
    }
}

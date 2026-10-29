<?php

namespace Database\Seeders;

use App\Models\Mascota;
use Illuminate\Database\Seeder;

class UpdateMascotasFotografiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especieMap = [
            'Perro' => 'dog',
            'Gato' => 'cat',
        ];

        $razaMap = [
            'Labrador' => 'labrador',
            'Pastor Alemán' => 'german shepherd',
            'Mestizo' => 'mixed breed',
            'Poodle' => 'poodle',
            'Beagle' => 'beagle',
            'Siamés' => 'siamese cat',
            'Persa' => 'persian cat',
            'Angora' => 'angora cat',
        ];

        Mascota::where('fotografia', 'like', 'http%')->chunkById(100, function ($mascotas) use ($especieMap, $razaMap) {
            foreach ($mascotas as $mascota) {
                $especieEn = $especieMap[$mascota->especie] ?? strtolower($mascota->especie);
                $razaEn = $razaMap[$mascota->raza] ?? $this->slugify($mascota->raza);

                $query = trim($especieEn.','.$razaEn);
                // Unsplash source con sig para estabilidad por id
                $url = 'https://source.unsplash.com/640x480/?'.urlencode($query).'&sig='.$mascota->id;

                $mascota->update(['fotografia' => $url]);
            }
        });
    }

    private function slugify(string $text): string
    {
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9]+/', ' ', $text);

        return trim($text);
    }
}

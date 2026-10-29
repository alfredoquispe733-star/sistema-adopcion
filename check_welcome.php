<?php

use App\Models\Mascota;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$mascotas = Mascota::latest()->get();
echo 'Total mascotas: '.$mascotas->count()."\n";
foreach ($mascotas->take(5) as $m) {
    echo $m->id." | {$m->nombre} | {$m->raza} | {$m->sexo} | {$m->edad_aproximada} | {$m->estado} | {$m->fotografia}\n";
}

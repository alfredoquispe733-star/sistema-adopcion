<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$rows = DB::table('mascotas')->orderBy('id')->limit(10)->get(['id', 'nombre', 'especie', 'raza', 'fotografia']);
foreach ($rows as $r) {
    echo $r->id." | {$r->nombre} | {$r->especie} / {$r->raza} | {$r->fotografia}\n";
}

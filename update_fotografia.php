<?php

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

$db = DB::connection('pgsql');

// Update first pet (id = 1) OR first by order
$firstId = DB::table('mascotas')->orderBy('id')->value('id');

echo "Primer ID: $firstId\n";

// Update first pet
$updatedFirst = DB::table('mascotas')
    ->where('id', $firstId)
    ->update(['fotografia' => 'mascotas/mascota1.jpg']);

echo "Actualizaciones en primera mascota: $updatedFirst\n";

// Also count placeholders before/after if updating all
$placeholderCountBefore = DB::table('mascotas')->where('fotografia', 'like', 'https://via.placeholder.com/%')->count();
echo "Placeholders antes: $placeholderCountBefore\n";

echo "Proceso completado.\n";

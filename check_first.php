<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

try {
    $db = DB::connection('pgsql');
    $rows = $db->select('SELECT id, nombre, fotografia FROM mascotas ORDER BY id ASC LIMIT 5');
    print_r($rows);
} catch (Throwable $e) {
    echo 'Error: '.$e->getMessage()."\n";
}

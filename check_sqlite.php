<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

try {
    $db = DB::connection('sqlite');
    $result = $db->select("SELECT name FROM sqlite_master WHERE type='table' AND name='mascotas'");
    echo "Table check:\n";
    print_r($result);

    $cols = $db->select('PRAGMA table_info(mascotas)');
    echo "Columns:\n";
    print_r($cols);

    $rows = $db->select('SELECT id, nombre, fotografia FROM mascotas LIMIT 10');
    echo "Rows:\n";
    print_r($rows);
} catch (Throwable $e) {
    echo 'Error: '.$e->getMessage()."\n";
}

<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

try {
    $db = DB::connection('pgsql');
    $result = $db->select("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_name='mascotas'");
    echo "Table check:\n";
    print_r($result);

    $cols = $db->select("SELECT column_name, data_type FROM information_schema.columns WHERE table_schema='public' AND table_name='mascotas' ORDER BY ordinal_position");
    echo "Columns:\n";
    print_r($cols);

    $rows = $db->select('SELECT id, nombre, fotografia FROM mascotas LIMIT 10');
    echo "Rows:\n";
    print_r($rows);
} catch (Throwable $e) {
    echo 'Error: '.$e->getMessage()."\n";
}

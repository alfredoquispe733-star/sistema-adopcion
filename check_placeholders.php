<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$db = DB::connection('pgsql');
$total = $db->scalar('SELECT COUNT(*) FROM mascotas');
$placeholder = $db->scalar("SELECT COUNT(*) FROM mascotas WHERE fotografia LIKE 'https://via.placeholder.com/%'");
$correct = $db->scalar("SELECT COUNT(*) FROM mascotas WHERE fotografia = 'mascotas/mascota1.jpg'");

echo "Total: $total\n";
echo "Placeholder: $placeholder\n";
echo "Correct: $correct\n";

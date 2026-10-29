<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=sistema-adopcion01;charset=utf8mb4', 'postgres', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SHOW TABLES');
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "Tables:\n";
    print_r($tables);
    if (in_array('mascotas', $tables)) {
        $stmt2 = $pdo->query('SELECT id, nombre, fotografia FROM mascotas LIMIT 5');
        print_r($stmt2->fetchAll(PDO::FETCH_ASSOC));
    }
} catch (Throwable $e) {
    echo 'Error: '.$e->getMessage()."\n";
}

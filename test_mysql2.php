<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=sistema-adopcion01;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SHOW TABLES');
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "Tables:\n";
    print_r($tables);
} catch (Throwable $e) {
    echo 'Error: '.$e->getMessage()."\n";
}

<?php

$db = new PDO('sqlite:D:/laragon/www/sistema-de-adopcion01/database/database.sqlite');
$stmt = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
print_r($stmt->fetchAll(PDO::FETCH_COLUMN));
$stmt2 = $db->query("SELECT * FROM sqlite_master WHERE type='table' AND name='mascotas'");
print_r($stmt2->fetchAll(PDO::FETCH_ASSOC));

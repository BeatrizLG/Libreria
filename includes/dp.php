<?php

$host = 'sql203.infinityfree.com';
$dbname = 'if0_38672384_biblioteca';
$username = 'if0_38672384';
$password = 'TF3ykhJoxPOqn';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
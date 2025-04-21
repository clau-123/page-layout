<?php
require_once 'config.php';
$config = require_once 'config/database.php';

try {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h1>El servidor está funcionando</h1>";
    echo "<h2>Conexión a la base de datos exitosa!</h2>";
    echo "<pre>";
    print_r($config);
    echo "</pre>";
} catch (PDOException $e) {
    echo "<h1>Error de conexión</h1>";
    echo "<pre>";
    echo "Error: " . $e->getMessage();
    echo "</pre>";
}
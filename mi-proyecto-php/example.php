<?php
require_once 'config.php';

// Usar las variables de entorno
$dbHost = getenv('DB_HOST');
$dbUser = getenv('DB_USER');
$dbPass = getenv('DB_PASS');
$dbName = getenv('DB_NAME');

// O también puedes usar
echo $_ENV['DB_HOST'];
echo $_SERVER['DB_HOST'];

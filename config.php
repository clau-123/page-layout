<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__);
}
define('PUBLIC_PATH', BASE_PATH . '/public');
define('ASSET_PATH', PUBLIC_PATH . '/assets');
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

function loadEnv($path) {
    if(!file_exists($path)) {
        throw new Exception('.env file not found');
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            if (!array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

// Cargar variables de entorno
loadEnv(__DIR__ . '/.env');

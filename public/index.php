<?php
session_start();
require_once __DIR__ . '/../config.php';

// Mejorado manejo de archivos estáticos
$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, '/public/assets/') !== false && preg_match('/\.(css|js)$/', $uri)) {
    $file = __DIR__ . str_replace('/public', '', $uri);
    if (file_exists($file)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        header('Content-Type: ' . ($ext === 'css' ? 'text/css' : 'application/javascript'));
        readfile($file);
        exit;
    }
}

function debug_autoloader($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    } else {
        error_log("No se pudo cargar la clase: $class (archivo: $file)");
    }
}

spl_autoload_register('debug_autoloader');

// Verificar si no hay sesión y la ruta no es login
if (!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] !== '/' && $_SERVER['REQUEST_URI'] !== '/login') {
    header('Location: /');
    exit;
}

try {
    $router = new \App\Core\Router();
    
    $router->add('/', '\App\Controllers\AuthController', 'showLogin');
    $router->add('/login', '\App\Controllers\AuthController', 'login');
    $router->add('/dashboard', '\App\Controllers\DashboardController', 'index');
    $router->add('/logout', '\App\Controllers\AuthController', 'logout');
    $router->add('/products', '\App\Controllers\ProductController', 'index');
    $router->add('/products/new', '\App\Controllers\ProductController', 'create');
    $router->add('/products/edit/{id}', '\App\Controllers\ProductController', 'edit');
    $router->add('/products/delete/{id}', '\App\Controllers\ProductController', 'delete');
    
    $router->run();
} catch (\Exception $e) {
    echo "<h1>Error</h1>";
    echo "<pre>";
    echo "Error: " . $e->getMessage();
    echo "</pre>";
}

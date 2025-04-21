<?php
namespace App\Controllers;

use App\Core\Database;
use App\Repositories\UserRepository;

class DashboardController {
    private $userRepository;

    public function __construct() {
        $db = Database::getInstance();
        $this->userRepository = new UserRepository($db);
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }
        
        // Obtener datos del usuario
        $user = $this->userRepository->findById($_SESSION['user_id']);
        $_SESSION['user'] = $user['username']; // Para mostrar en el navbar
        
        // Ensure dashboard layout is used
        $layout = 'dashboard';
        $additionalCss = 'dashboard';
        
        // Capturar el contenido de la vista
        ob_start();
        require_once BASE_PATH . '/views/dashboard/index.php';
        $content = ob_get_clean();
        
        // Renderizar con el layout
        require_once BASE_PATH . '/views/layouts/dashboard.php';
    }
}

<?php
namespace App\Controllers;

use App\Services\AuthService;
use App\Repositories\UserRepository;
use App\Core\Database;

class AuthController {
    private $authService;

    public function __construct() {
        try {
            $db = Database::getInstance();
            $userRepository = new UserRepository($db);
            $this->authService = new AuthService($userRepository);
        } catch (\Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function showLogin() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit;
        }
        require_once __DIR__ . '/../../views/auth/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if ($this->authService->login($username, $password)) {
                header('Location: /dashboard');
                exit;
            }
            
            header('Location: /?error=1');
            exit;
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /');
        exit;
    }
}

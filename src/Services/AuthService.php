<?php
namespace App\Services;

use App\Repositories\UserRepository;

class AuthService {
    private $userRepository;
    
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    public function login($username, $password) {
        $user = $this->userRepository->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user'] = $user['username'];
            return true;
        }
        return false;
    }
}

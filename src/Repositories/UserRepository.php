<?php
namespace App\Repositories;

use PDO;
use App\Models\User;

class UserRepository {
    private $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    public function findByUsername($username) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

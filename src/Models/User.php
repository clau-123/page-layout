<?php
namespace App\Models;

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    
    // Getters and setters
    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    
    public function setUsername($username) { $this->username = $username; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = password_hash($password, PASSWORD_DEFAULT); }
}

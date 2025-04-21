<?php
namespace App\Models;

class Product {
    private $id;
    private $name;
    private $description;
    private $stock;
    private $price;
    private $createdAt;

    // Getters and setters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getStock() { return $this->stock; }
    public function getPrice() { return $this->price; }
    public function getCreatedAt() { return $this->createdAt; }

    public function setName($name) { $this->name = $name; }
    public function setDescription($description) { $this->description = $description; }
    public function setStock($stock) { $this->stock = $stock; }
    public function setPrice($price) { $this->price = $price; }
}

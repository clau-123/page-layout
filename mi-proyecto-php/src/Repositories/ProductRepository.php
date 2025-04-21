<?php
namespace App\Repositories;

use PDO;

class ProductRepository {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = $this->db->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO products (name, description, stock, price) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$data['name'], $data['description'], $data['stock'], $data['price']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE products SET name = ?, description = ?, stock = ?, price = ? WHERE id = ?');
        return $stmt->execute([$data['name'], $data['description'], $data['stock'], $data['price'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = ?');
        return $stmt->execute([$id]);
    }
}

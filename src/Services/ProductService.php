<?php
namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService {
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts() {
        return $this->productRepository->findAll();
    }

    public function getProductById($id) {
        return $this->productRepository->findById($id);
    }

    public function createProduct($data) {
        return $this->productRepository->create($data);
    }

    public function updateProduct($id, $data) {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct($id) {
        return $this->productRepository->delete($id);
    }
}

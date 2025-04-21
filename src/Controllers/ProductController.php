<?php
namespace App\Controllers;

use App\Services\ProductService;
use App\Core\Database;
use App\Core\AssetManager;

class ProductController {
    private $productService;

    public function __construct() {
        $db = Database::getInstance();
        $this->productService = new ProductService(new \App\Repositories\ProductRepository($db));
    }

    public function index() {
        $additionalCss = 'products'; 
        $products = $this->productService->getAllProducts();
        
        ob_start();
        require_once __DIR__ . '/../../views/products/index.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../../views/layouts/dashboard.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'stock' => $_POST['stock'],
                'price' => $_POST['price']
            ];
            $this->productService->createProduct($data);
            header('Location: /products');
            exit;
        }

        $additionalCss = 'forms';

        AssetManager::getInstance()->addCss('forms');

        ob_start();
        require_once __DIR__ . '/../../views/products/form.php';
        $content = ob_get_clean();

        require_once __DIR__ . '/../../views/layouts/dashboard.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'stock' => $_POST['stock'],
                'price' => $_POST['price']
            ];
            $this->productService->updateProduct($id, $data);
            header('Location: /products');
            exit;
        }

        $product = $this->productService->getProductById($id);
        if (!$product) {
            header('HTTP/1.0 404 Not Found');
            echo "Producto no encontrado";
            exit;
        }

        $additionalCss = 'forms';

        ob_start();
        require_once __DIR__ . '/../../views/products/form.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../../views/layouts/dashboard.php';
    }

    public function delete($id) {
        $this->productService->deleteProduct($id);
        header('Location: /products');
        exit;
    }
}

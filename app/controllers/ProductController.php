<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController {
    private ProductModel $model;

    public function __construct() {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
        $this->model = new ProductModel();
    }

    public function index(): void {
        $products = $this->model->all();
        require __DIR__ . '/../views/products/index.php';
    }

    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->store();
            return;
        }
        require __DIR__ . '/../views/products/create.php';
    }

    public function store(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'product_name' => trim($_POST['product_name'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'price' => (float)($_POST['price'] ?? 0),
                'quantity' => (int)($_POST['quantity'] ?? 0),
            ];

            $this->model->save($data);
            header('Location: /products');
            exit;
        }
    }

    public function edit(?int $id = null): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->update();
            return;
        }

        $id = $id ?? (int)($_GET['id'] ?? 0);
        $product = $this->model->find($id);
        if (!$product) {
            header('Location: /products');
            exit;
        }
        require __DIR__ . '/../views/products/edit.php';
    }

    public function update(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)($_POST['id'] ?? 0);
            $data = [
                'product_name' => trim($_POST['product_name'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'price' => (float)($_POST['price'] ?? 0),
                'quantity' => (int)($_POST['quantity'] ?? 0),
            ];

            $this->model->update($id, $data);
            header('Location: /products');
            exit;
        }
    }

    public function delete(?int $id = null): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)($_POST['id'] ?? 0);
            $this->model->delete($id);
            header('Location: /products');
            exit;
        }

        $id = $id ?? (int)($_GET['id'] ?? 0);
        if ($id) {
            $product = $this->model->find($id);
            if ($product) {
                require __DIR__ . '/../views/products/delete.php';
                return;
            }
        }
        header('Location: /products');
        exit;
    }
}

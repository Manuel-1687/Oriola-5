<?php
require_once __DIR__ . '/../bootstrap.php';

class ProductModel {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function all(): array {
        $stmt = $this->pdo->query('SELECT * FROM products ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch();
        return $product ?: null;
    }

    public function save(array $data): bool {
        $stmt = $this->pdo->prepare('INSERT INTO products (product_name, description, price, quantity, created_at) VALUES (:product_name, :description, :price, :quantity, CURRENT_TIMESTAMP)');
        return $stmt->execute($data);
    }

    public function update(int $id, array $data): bool {
        $stmt = $this->pdo->prepare('UPDATE products SET product_name = :product_name, description = :description, price = :price, quantity = :quantity WHERE id = :id');
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}

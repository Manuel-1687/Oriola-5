<?php
require_once __DIR__ . '/../app/bootstrap.php';

$pdo = Database::connect();
$productCount = $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
if ((int)$productCount === 0) {
    $pdo->exec("INSERT INTO products (product_name, description, price, quantity, created_at) VALUES
        ('Notebook', 'A compact notebook', 10.50, 20, CURRENT_TIMESTAMP),
        ('Desk Lamp', 'LED desk lamp', 25.00, 15, CURRENT_TIMESTAMP)");
}

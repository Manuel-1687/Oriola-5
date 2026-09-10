<?php
require_once __DIR__ . '/app/bootstrap.php';
require_once __DIR__ . '/app/models/ProductModel.php';

$pdo = Database::connect();
$pdo->exec("DELETE FROM products");

$model = new ProductModel();
$model->save([
    'product_name' => 'Notebook',
    'description' => 'A compact notebook',
    'price' => 10.50,
    'quantity' => 20,
]);

$products = $model->all();
if (count($products) < 1) {
    echo "FAIL: products table not seeded\n";
    exit(1);
}

$id = (int)$products[0]['id'];
$product = $model->find($id);
if (!$product || $product['product_name'] !== 'Notebook') {
    echo "FAIL: product create/read check\n";
    exit(1);
}

$model->update($id, [
    'product_name' => 'Notebook Updated',
    'description' => 'Updated',
    'price' => 12.75,
    'quantity' => 30,
]);

$updated = $model->find($id);
if (!$updated || $updated['product_name'] !== 'Notebook Updated') {
    echo "FAIL: product update check\n";
    exit(1);
}

$model->delete($id);
$deleted = $model->find($id);
if ($deleted) {
    echo "FAIL: product delete check\n";
    exit(1);
}

echo "PASS: CRUD smoke test OK\n";

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Product</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eef3f7; margin: 0; padding: 30px; }
        .container { max-width: 640px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
        label { display: block; margin-top: 12px; }
        input, textarea { width: 100%; padding: 10px; margin-top: 6px; }
        button { margin-top: 20px; padding: 10px 16px; background: #0d6efd; color: #fff; border: none; border-radius: 5px; }
        a { color: #0d6efd; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form method="post" action="/products/update">
            <input type="hidden" name="id" value="<?= (int)$product['id'] ?>">

            <label>Product Name</label>
            <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required>

            <label>Description</label>
            <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea>

            <label>Price</label>
            <input type="number" name="price" step="0.01" value="<?= htmlspecialchars((float)$product['price']) ?>" required>

            <label>Quantity</label>
            <input type="number" name="quantity" value="<?= htmlspecialchars((int)$product['quantity']) ?>" required>

            <button type="submit">Update Product</button>
            <a href="/products">Back to list</a>
        </form>
    </div>
</body>
</html>

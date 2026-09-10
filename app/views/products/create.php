<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Product</title>
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
        <h2>Add Product</h2>
        <form method="post" action="/products/store">
            <label>Product Name</label>
            <input type="text" name="product_name" required>

            <label>Description</label>
            <textarea name="description" required></textarea>

            <label>Price</label>
            <input type="number" name="price" step="0.01" required>

            <label>Quantity</label>
            <input type="number" name="quantity" required>

            <button type="submit">Save Product</button>
            <a href="/products">Back to list</a>
        </form>
    </div>
</body>
</html>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Product</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eef3f7; margin: 0; padding: 30px; }
        .container { max-width: 540px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
        button { padding: 10px 16px; background: #dc3545; color: #fff; border: none; border-radius: 5px; }
        a { color: #0d6efd; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Product</h2>
        <p>Are you sure you want to delete <strong><?= htmlspecialchars($product['product_name']) ?></strong>?</p>
        <form method="post" action="/products/delete">
            <input type="hidden" name="id" value="<?= (int)$product['id'] ?>">
            <button type="submit">Delete</button>
            <a href="/products">Cancel</a>
        </form>
    </div>
</body>
</html>

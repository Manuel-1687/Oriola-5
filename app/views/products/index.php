<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Products</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eef3f7; margin: 0; padding: 30px; }
        .container { max-width: 960px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
        h2 { margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #0d6efd; color: white; }
        a, button { margin-right: 6px; color: #0d6efd; text-decoration: none; }
        .btn { display: inline-block; padding: 8px 12px; background: #0d6efd; color: white; border-radius: 5px; }
        .danger { background: #dc3545; }
        .head { display: flex; justify-content: space-between; align-items: center; gap: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="head">
            <h2>Product List</h2>
            <div>
                <a class="btn" href="/products/create">Add Product</a>
                <a class="btn danger" href="/logout">Logout</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['id']) ?></td>
                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                        <td><?= htmlspecialchars($product['description']) ?></td>
                        <td><?= htmlspecialchars(number_format((float)$product['price'], 2)) ?></td>
                        <td><?= htmlspecialchars($product['quantity']) ?></td>
                        <td><?= htmlspecialchars($product['created_at']) ?></td>
                        <td>
                            <a href="/products/edit/<?= (int)$product['id'] ?>">Edit</a>
                            <a href="/products/delete/<?= (int)$product['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

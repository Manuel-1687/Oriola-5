<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Products</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 80% 10%, rgba(107, 190, 255, 0.45), transparent 24%),
                radial-gradient(circle at 60% 90%, rgba(202, 93, 255, 0.40), transparent 22%),
                linear-gradient(135deg, #07111f 0%, #16213f 100%);
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            color: #eefaff;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 30px;
            border-radius: 22px;
            border: 1px solid rgba(245, 251, 255, 0.35);
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.45), inset 0 0 30px rgba(255,255,255,0.04);
        }

        .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 16px;
        }

        h2 {
            margin: 0;
            color: #88ffd8;
            font-size: 34px;
            font-weight: 700;
        }

        .head > div {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: rgba(255, 255, 255, 0.05);
        }

        th, td {
            border: 1px solid rgba(255,255,255,0.20);
            padding: 12px 10px;
            text-align: left;
        }

        th {
            background: linear-gradient(135deg, #88ffd8, #6c88ff);
            color: #07111f;
            font-weight: 700;
        }

        td {
            color: #eefaff;
        }

        tr:nth-child(even) {
            background: rgba(255,255,255,0.04);
        }

        a {
            margin-right: 6px;
            color: #88ffd8;
            text-decoration: none;
            font-weight: 700;
        }

        a:hover {
            color: #ffffff;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            background: linear-gradient(135deg, #88ffd8, #6c88ff);
            color: #07111f;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
        }

        .btn:hover {
            box-shadow: 0 0 14px rgba(136, 255, 216, 0.7);
        }

        .danger {
            background: linear-gradient(135deg, #ff9a9e, #c44569);
            color: #fff;
        }
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

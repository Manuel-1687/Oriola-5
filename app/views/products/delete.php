<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Product</title>
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
            max-width: 540px;
            margin: auto;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 30px;
            border-radius: 22px;
            border: 1px solid rgba(245, 251, 255, 0.35);
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.45), inset 0 0 30px rgba(255,255,255,0.04);
        }

        h2 {
            margin: 0 0 16px;
            color: #88ffd8;
            font-size: 34px;
            font-weight: 700;
        }

        p {
            color: #eefaff;
            font-size: 16px;
        }

        strong {
            color: #88ffd8;
        }

        form {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        button {
            padding: 12px 16px;
            background: linear-gradient(135deg, #ff9a9e, #c44569);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
        }

        button:hover {
            box-shadow: 0 0 14px rgba(255, 154, 158, 0.7);
        }

        a {
            color: #88ffd8;
            text-decoration: none;
            font-weight: 700;
        }

        a:hover {
            color: #ffffff;
        }
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

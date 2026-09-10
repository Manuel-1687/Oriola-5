<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Product</title>
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
            max-width: 640px;
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

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        label {
            display: block;
            margin-top: 8px;
            color: #eefaff;
            font-weight: 700;
        }

        input, textarea {
            width: 100%;
            padding: 12px 14px;
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.30);
            background: rgba(0, 0, 0, 0.34);
            color: #fff;
            outline: none;
            font-size: 15px;
        }

        input:focus, textarea:focus {
            border-color: #88ffd8;
            box-shadow: 0 0 0 2px rgba(136, 255, 216, 0.22);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button {
            margin-top: 20px;
            padding: 12px 16px;
            background: linear-gradient(135deg, #88ffd8, #6c88ff);
            color: #07111f;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
        }

        button:hover {
            box-shadow: 0 0 14px rgba(136, 255, 216, 0.7);
        }

        a {
            color: #88ffd8;
            text-decoration: none;
            font-weight: 700;
            margin-top: 10px;
        }

        a:hover {
            color: #ffffff;
        }
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

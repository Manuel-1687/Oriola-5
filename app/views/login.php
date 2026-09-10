<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f7f7f7; padding: 40px; }
        .login-box { max-width: 420px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { background: #0d6efd; color: #fff; padding: 12px 16px; border: 0; border-radius: 6px; cursor: pointer; }
        .error { color: #b00020; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (isset($error)) echo '<p class="error">' . htmlspecialchars($error) . '</p>'; ?>
        <form method="post" action="/">
            <label>Email</label>
            <input type="email" name="email" value="admin@lavalust.local" required>
            <label>Password</label>
            <input type="password" name="password" value="password123" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

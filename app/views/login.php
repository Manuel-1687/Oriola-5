<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 80% 10%, rgba(107, 190, 255, 0.45), transparent 24%),
                radial-gradient(circle at 60% 90%, rgba(202, 93, 255, 0.40), transparent 22%),
                linear-gradient(135deg, #07111f 0%, #16213f 100%);
            color: #f8f8f8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-box {
            width: min(460px, calc(100vw - 48px));
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(245, 251, 255, 0.35);
            border-radius: 22px;
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.45), inset 0 0 30px rgba(255,255,255,0.04);
            padding: 30px 28px;
            color: #f8f8f8;
        }

        .login-box h2 {
            margin: 0 0 14px;
            font-size: 34px;
            font-weight: 700;
            color: #88ffd8;
            text-align: center;
        }

        .login-box .credentials {
            display: block;
            font-size: 16px;
            color: #dffcf8;
            text-align: center;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .error {
            color: #ff6d6d;
            font-size: 15px;
            text-align: center;
            margin: 0 0 14px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            margin-top: 8px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.30);
            background: rgba(0, 0, 0, 0.34);
            color: #fff;
            outline: none;
            font-size: 15px;
        }

        input:focus {
            border-color: #88ffd8;
            box-shadow: 0 0 0 2px rgba(136, 255, 216, 0.22);
        }

        button {
            width: 100%;
            margin-top: 14px;
            padding: 12px;
            border: 0;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            color: #07111f;
            background: linear-gradient(135deg, #88ffd8, #6c88ff);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            box-shadow: 0 0 14px rgba(136, 255, 216, 0.7);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <span class="credentials">User: Manuel<br>Password: Oriola123</span>
        <?php if (isset($error)) echo '<p class="error">' . htmlspecialchars($error) . '</p>'; ?>
        <form method="post" action="/">
            <label>Username</label>
            <input type="text" name="username" value="Manuel" required>
            <label>Password</label>
            <input type="password" name="password" value="Oriola123" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

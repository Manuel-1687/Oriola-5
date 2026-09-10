<?php
require_once __DIR__ . '/../bootstrap.php';

class AuthController {
    private const USERNAME = 'Manuel';
    private const PASSWORD = 'Oriola123';

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($username === self::USERNAME && $password === self::PASSWORD) {
                $_SESSION['user'] = ['username' => $username];
                header('Location: /products');
                exit;
            }

            $error = 'Invalid credentials';
        }

        require __DIR__ . '/../views/login.php';
    }

    public function logout(): void {
        session_unset();
        session_destroy();
        header('Location: /');
        exit;
    }
}

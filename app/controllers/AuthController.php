<?php
require_once __DIR__ . '/../bootstrap.php';

class AuthController {
    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            if ($email === env('LOGIN_EMAIL') && $password === env('LOGIN_PASSWORD')) {
                $_SESSION['user'] = ['email' => $email];
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

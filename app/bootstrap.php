<?php
session_start();

function env($key, $default = null) {
    $value = getenv($key);
    if ($value !== false && $value !== '') {
        return $value;
    }

    $value = $_ENV[$key] ?? null;
    if ($value !== null && $value !== '') {
        return $value;
    }

    $file = __DIR__ . '/../.env';
    if (file_exists($file)) {
        $values = parse_ini_file($file);
        if (isset($values[$key])) {
            return $values[$key];
        }
    }

    return $default;
}

class Database {
    private static ?PDO $pdo = null;

    public static function connect(): PDO {
        if (self::$pdo) {
            return self::$pdo;
        }

        $driver = strtolower(env('DB_CONNECTION', 'sqlite'));
        if ($driver === 'mysql') {
            $host = env('DB_HOST');
            $port = env('DB_PORT', '3306');
            $name = env('DB_NAME');
            $user = env('DB_USERNAME');
            $pass = env('DB_PASSWORD');

            if (!$host || !$name || !$user) {
                die('MySQL Aiven environment variables are not configured.');
            }

            $dsn = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $name . ';charset=utf8mb4';
        } else {
            if (!is_dir(__DIR__ . '/../storage')) {
                mkdir(__DIR__ . '/../storage', 0777, true);
            }

            $dsn = 'sqlite:' . __DIR__ . '/../storage/app.sqlite';
            $user = null;
            $pass = null;
        }

        try {
            self::$pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }

        return self::$pdo;
    }
}

function productTableSchema(PDO $pdo): void {
    $driver = strtolower(env('DB_CONNECTION', 'sqlite'));

    if ($driver === 'mysql') {
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT PRIMARY KEY AUTO_INCREMENT,
            product_name VARCHAR(100) NOT NULL,
            description TEXT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            quantity INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    } else {
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            product_name VARCHAR(100) NOT NULL,
            description TEXT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            quantity INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }

    $pdo->exec($sql);
}

$pdo = Database::connect();
productTableSchema($pdo);

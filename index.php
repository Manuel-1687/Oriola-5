<?php
require __DIR__ . '/app/bootstrap.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$basePath = '/index.php';

if (str_starts_with($requestUri, '/index.php')) {
    $requestUri = str_replace('/index.php', '', $requestUri);
}

switch ($requestUri) {
    case '/':
    case '/login':
        require __DIR__ . '/app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;

    case '/logout':
        require __DIR__ . '/app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    case '/products':
        require __DIR__ . '/app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index();
        break;

    case '/products/create':
        require __DIR__ . '/app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->create();
        break;

    case '/products/store':
        require __DIR__ . '/app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->store();
        break;

    case '/products/edit':
        require __DIR__ . '/app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->edit();
        break;

    case '/products/update':
        require __DIR__ . '/app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->update();
        break;

    case '/products/delete':
        require __DIR__ . '/app/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->delete();
        break;

    default:
        if (preg_match('#^/products/edit/(\d+)$#', $requestUri, $matches)) {
            require __DIR__ . '/app/controllers/ProductController.php';
            $controller = new ProductController();
            $controller->edit((int)$matches[1]);
            break;
        }

        if (preg_match('#^/products/delete/(\d+)$#', $requestUri, $matches)) {
            require __DIR__ . '/app/controllers/ProductController.php';
            $controller = new ProductController();
            $controller->delete((int)$matches[1]);
            break;
        }

        http_response_code(404);
        echo "Page not found";
}

<?php

    require_once __DIR__ . '/../app/controllers/AuthController.php';

    $authController = new AuthController($pdo);

    $page = $_GET['page'] ?? 'home';

    switch ($page) {
        case 'home':
            require __DIR__ . '/../app/views/home.php';
            break;

        case 'dashboard':
            if (!isset($_SESSION['user_id'])) {
                header('Location: ?page=login');
                exit;
            }

            require __DIR__ . '/../app/views/dashboard.php';
            break;
            
        case 'perfil':
            if (!isset($_SESSION['user_id'])) {
                header('Location: ?page=login');
                exit;
            }

            require __DIR__ . '/../app/views/perfil.php';
            break;

        case 'login':
            $authController->showLogin();
            break;

        case 'register':
            $authController->showRegister();
            break;

        case 'login-post':
            $authController->login();
            break;

        case 'register-post':
            $authController->register();
            break;

        case 'logout':
            $authController->logout();
            break;

        default:
            http_response_code(404);
    }
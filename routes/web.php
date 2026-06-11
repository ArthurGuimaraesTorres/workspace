<?php

    require_once __DIR__ . '/../app/controllers/AuthController.php';

    $authController = new AuthController($pdo);

    $page = $_GET['page'] ?? 'home';

    if ($page === 'login') {
        $authController->showLogin();
    } elseif ($page === 'register') {
        $authController->showRegister();
    } elseif ($page === 'login-post' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $authController->login();
    } elseif ($page === 'register-post' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $authController->register();
    } elseif ($page === 'logout') {
        $authController->logout();
    } else {
        require __DIR__ . '/../header.php';

        echo '<div class="container mt-5">';
        echo '<h1>Home</h1>';

        if (isset($_SESSION['user_id'])) {
            echo '<p>Olá, ' . htmlspecialchars($_SESSION['user_name']) . '</p>';
            echo '<a href="?page=logout" class="btn btn-danger">Sair</a>';
        } else {
            echo '<a href="?page=login" class="btn btn-primary">Entrar</a>';
            echo '<a href="?page=register" class="btn btn-outline-primary">Cadastrar</a>';
        }

        echo '</div>';

        require __DIR__ . '/../footer.php';
    }
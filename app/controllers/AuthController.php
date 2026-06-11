<?php

    require_once __DIR__ ."/../models/User.php";
    require_once __DIR__ ."/../../config/database.php";

    class AuthController
    {
        private User $userModel;

        public function __construct(PDO $pdo)
        {
            $this->userModel = new User($pdo);
        }

        public function showLogin(): void
        {
            require __DIR__ . '/../views/auth/login.php';
        }

        public function showRegister(): void
        {
            require __DIR__ . '/../views/auth/register.php';
        }

        public function register(): void
        {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!$name || !$email || !$password) {
                $_SESSION['error'] = 'Preencha todos os campos.';
                header('Location: ?page=register');
                exit;
            }

            $this->userModel->create($name, $email, $password);

            $_SESSION['success'] = 'Cadastro realizado com sucesso!';
            header('Location: ?page=login');
            exit;
        }

        public function login(): void
        {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findByEmail($email);

            if (!$user || !password_verify($password, $user['password'])) {
                $_SESSION['error'] = 'Email ou senha inválidos.';
                header('Location: ?page=login');
                exit;
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header('Location: ?page=home');
            exit;
        }

        public function logout(): void
        {
            session_destroy();
            
            header('Location: ?page=login');
            exit;
        }
    }
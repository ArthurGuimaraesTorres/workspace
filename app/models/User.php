<?php

    class User
    {
        private PDO $pdo;
        
        public function __construct (PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function create(string $name, string $email, string $password): bool
        {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                'name' => $name,
                'email'=> $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        }

        public function findByEmail(string $email): ?array
        {
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['email' => $email]);

            $users = $stmt->fetch(PDO::FETCH_ASSOC);

            return $users ?: null;
        }
    }
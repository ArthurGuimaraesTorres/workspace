<?php
    $hideNavbar = true;
    require __DIR__ ."/../../../header.php";
?>

<div class="container mt-5">
    <h1>Cadastro</h1>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form action="?page=register-post" method="POST">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="?page=login" class="btn btn-link">Já tenho uma conta</a>
    </form>
</div>

<?php require __DIR__ . '/../../../footer.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTs. | Workspace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php if (empty($hideNavbar)): ?>
        <nav class="navbar navbar-light bg-light shadow-sm">
            <div class="container-fluid px-3 d-flex align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#menuLateral"
                        aria-controls="menuLateral"
                        aria-label="Abrir menu"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand mb-0" href="?page=home">GTs. | Workspace</a>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="navbar-text">
                            Bem-vindo, <?= htmlspecialchars($_SESSION['user_name']) ?>!
                        </span>
                    <?php endif; ?>
                </div>

                <a class="nav-link text-danger ms-auto" href="?page=logout">Sair</a>
            </div>
        </nav>

        <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="menuLateral"
            aria-labelledby="menuLateralTitulo"
        >
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="menuLateralTitulo">Menu</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"
                    aria-label="Fechar menu"
                ></button>
            </div>

            <div class="offcanvas-body">
                <nav class="nav nav-pills flex-column gap-2">
                    <a class="nav-link" href="?page=dashboard">Dashboard</a>
                    <a class="nav-link" href="?page=perfil">Perfil</a>
                </nav>
            </div>
        </div>
    <?php endif; ?>

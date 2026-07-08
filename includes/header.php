<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Web UT Selva</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <strong>UT Selva</strong> - Sistema Web
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION['usuario_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/listado.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/logout.php">Cerrar Sesión</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/login.php">Iniciar Sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
<?php
require_once 'config/database.php';
include_once 'includes/header.php';
?>

<div class="jumbotron bg-light p-5 rounded">
    <h1 class="display-4">🏫 Universidad Tecnológica de la Selva</h1>
    <p class="lead">Sistema de Autenticación y Gestión de Productos</p>
    <hr class="my-4">
    <p>
        Este sistema implementa autenticación segura con encriptación de contraseñas (MD5),
        gestión de sesiones y listado de productos desde base de datos MySQL.
    </p>
    <?php if(!isset($_SESSION['usuario_id'])): ?>
        <a class="btn btn-primary btn-lg" href="pages/login.php" role="button">Iniciar Sesión</a>
        <a class="btn btn-success btn-lg" href="pages/listado.php" role="button">Ver Productos</a>
    <?php else: ?>
        <a class="btn btn-success btn-lg" href="pages/dashboard.php" role="button">Ir al Dashboard</a>
        <a class="btn btn-info btn-lg" href="pages/listado.php" role="button">Ver Productos</a>
    <?php endif; ?>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">🔐 Seguridad</h5>
                <p class="card-text">Contraseñas encriptadas con MD5. Sistema de autenticación seguro.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">📊 Base de Datos</h5>
                <p class="card-text">Conexión a MySQL con XAMPP. Tablas: usuarios y productos.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">📦 Gestión</h5>
                <p class="card-text">Listado dinámico de productos. Interfaz responsive con Bootstrap.</p>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>

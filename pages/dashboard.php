<?php
require_once '../config/database.php';

// Verificar si el usuario está logueado
if(!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

include_once '../includes/header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3>Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?> 👋</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Usuarios</h5>
                                <?php
                                $result = $conn->query("SELECT COUNT(*) as total FROM usuarios");
                                $row = $result->fetch_assoc();
                                ?>
                                <p class="card-text display-6"><?php echo $row['total']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Productos</h5>
                                <?php
                                $result = $conn->query("SELECT COUNT(*) as total FROM productos");
                                $row = $result->fetch_assoc();
                                ?>
                                <p class="card-text display-6"><?php echo $row['total']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Categorías</h5>
                                <?php
                                $result = $conn->query("SELECT COUNT(DISTINCT categoria) as total FROM productos");
                                $row = $result->fetch_assoc();
                                ?>
                                <p class="card-text display-6"><?php echo $row['total']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
                <h4>📊 Resumen del Sistema</h4>
                <p>Bienvenido al sistema de gestión. Has iniciado sesión correctamente.</p>
                <ul>
                    <li><strong>Usuario:</strong> <?php echo $_SESSION['usuario_email']; ?></li>
                    <li><strong>Fecha y hora:</strong> <?php echo date('d/m/Y H:i:s'); ?></li>
                    <li><strong>Seguridad:</strong> Contraseñas encriptadas con MD5</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include_once '../includes/footer.php'; ?>
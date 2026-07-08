<?php
require_once '../config/database.php';

// Verificar si el usuario está logueado
if(!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

include_once '../includes/header.php';

// Obtener todos los productos
$sql = "SELECT * FROM productos ORDER BY id DESC";
$result = $conn->query($sql);
?>

<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3>📦 Listado de Productos</h3>
        <span class="badge bg-light text-dark">Total: <?php echo $result->num_rows; ?></span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><strong><?php echo htmlspecialchars($row['nombre']); ?></strong></td>
                                <td><?php echo htmlspecialchars(substr($row['descripcion'], 0, 30)) . '...'; ?></td>
                                <td>$<?php echo number_format($row['precio'], 2); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo $row['cantidad'] > 10 ? 'success' : 'warning'; ?>">
                                        <?php echo $row['cantidad']; ?>
                                    </span>
                                </td>
                                <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['fecha_creacion'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No hay productos registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once '../includes/footer.php'; ?>
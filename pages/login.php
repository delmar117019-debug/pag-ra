<?php
require_once '../config/database.php';

// Si ya está logueado, redirigir al dashboard
if(isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    // Aplicar seguridad MD5 a la contraseña
    $contrasena_segura = md5($contrasena);
    
    $sql = "SELECT id, nombre_usuario, email FROM usuarios 
            WHERE nombre_usuario = ? AND contrasena = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasena_segura);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nombre'] = $row['nombre_usuario'];
        $_SESSION['usuario_email'] = $row['email'];
        
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .login-card h2 {
            color: #333;
            text-align: center;
            margin-bottom: 25px;
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: bold;
        }
        .btn-login:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card">
            <h2>🔐 Iniciar Sesión</h2>
            <p class="text-muted text-center">UT Selva - Sistema Web</p>
            
            <?php if($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
                <button type="submit" class="btn btn-primary btn-login">Ingresar</button>
                <div class="text-center mt-3">
                    <small class="text-muted">
                        Usuario: admin | Contraseña: admin123
                    </small>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
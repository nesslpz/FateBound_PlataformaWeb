
<?php 
session_start();
// Si el usuario ya está logueado, redirigir al índice
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - FateBound</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="section-dark">

<div class="container py-5">
    <div class="card card-dark shadow-lg mx-auto p-4" style="max-width: 500px;">
        <h2 class="text-center mb-4" style="color: #e0ac69;">Crear Cuenta FateBound</h2>
        
        <?php 
        if (isset($_GET['success'])): ?>
            <div class="alert alert-success text-center">¡Registro exitoso! <a href="login.php">Inicia Sesión.</a></div>
        <?php elseif (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form action="registrar_usuario.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control bg-dark text-light border-secondary" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control bg-dark text-light border-secondary" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control bg-dark text-light border-secondary" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control bg-dark text-light border-secondary" id="password_confirm" name="password_confirm" required>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto mt-4">Registrarse</button>
            <p class="text-center mt-3 text-muted">
                ¿Ya tienes cuenta? <a href="login.php" style="color: #e0ac69;">Inicia Sesión.</a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
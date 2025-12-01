<?php
require 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
        header("Location: registro.php?error=" . urlencode("Todos los campos son obligatorios."));
        exit();
    }

    if ($password !== $password_confirm) {
        header("Location: registro.php?error=" . urlencode("Las contraseñas no coinciden."));
        exit();
    }
    
    // Generar el hash seguro de la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // 1. Verificar si el usuario o email ya existen
        $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE username = ? OR email = ?");
        $stmt_check->execute([$username, $email]);
        if ($stmt_check->fetchColumn() > 0) {
            header("Location: registro.php?error=" . urlencode("El usuario o correo ya está registrado."));
            exit();
        }

        // 2. Insertar el nuevo usuario
        $sql = "INSERT INTO usuarios (username, email, password_hash) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password_hash]);

        header("Location: registro.php?success=1");
        exit();

    } catch (PDOException $e) {
        // Error de la base de datos
        header("Location: registro.php?error=" . urlencode("Error al registrar: " . $e->getMessage()));
        exit();
    }
} else {
    header("Location: registro.php");
    exit();
}
?>
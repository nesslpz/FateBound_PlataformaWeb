<?php
session_start();
require 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username_or_email) || empty($password)) {
        header("Location: login.php?error=" . urlencode("Usuario y contraseña son obligatorios."));
        exit();
    }

    try {
        $sql = "SELECT user_id, username, password_hash FROM usuarios WHERE username = ? OR email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username_or_email, $username_or_email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Éxito: Iniciar sesión
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirigir al índice
            header("Location: index.php");
            exit();
        } else {
            // Error de credenciales
            header("Location: login.php?error=" . urlencode("Credenciales incorrectas."));
            exit();
        }

    } catch (PDOException $e) {
        header("Location: login.php?error=" . urlencode("Error del servidor."));
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
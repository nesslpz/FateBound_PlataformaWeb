
<?php
session_start();
require 'db_connect.php'; 

// REQUERIMIENTO CLAVE: El usuario debe estar logueado para publicar
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=" . urlencode("Debes iniciar sesión para publicar."));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtener el ID del usuario de la sesión
    $user_id = $_SESSION['user_id']; 
    $titulo = trim($_POST['titulo']);
    $contenido = trim($_POST['contenido']);
    
    if (empty($titulo) || empty($contenido)) {
        header("Location: index.php?error=" . urlencode("El título y el contenido son obligatorios."));
        exit();
    }

    try {
        $sql = "INSERT INTO publicaciones_foro (user_id, titulo, contenido) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $titulo, $contenido]);

        header("Location: index.php?success=postguardado#comunidad");
        exit();

    } catch (PDOException $e) {
        header("Location: index.php?error=" . urlencode("Error al guardar en la base de datos."));
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
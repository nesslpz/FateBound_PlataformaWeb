
<?php
require 'db_connect.php'; 

$historia = null;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $historia_id = $_GET['id'];
    
    try {
        $stmt = $pdo->prepare("SELECT titulo, contenido_completo FROM historias_breves WHERE historia_id = ?");
        $stmt->execute([$historia_id]);
        $historia = $stmt->fetch();
    } catch (PDOException $e) { /* Error */ }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $historia ? htmlspecialchars($historia['titulo']) : 'Historia no encontrada'; ?> | FateBound</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="section-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">FATEBOUND</a>
        <a class="btn btn-outline-light ms-auto" href="index.php#biblioteca">← Volver a la Biblioteca</a>
    </div>
</nav>

<section class="container py-5">
    <?php if ($historia): ?>
        <article class="card card-dark shadow-lg p-5">
            <h1 class="display-4 mb-4" style="color: #e0ac69;"><?php echo htmlspecialchars($historia['titulo']); ?></h1>
            <hr style="border-color: #3a3a3a;">
            <div class="historia-contenido fs-5 text-light"> <?php echo nl2br(htmlspecialchars($historia['contenido_completo'])); ?>
            </div>
            <p class="mt-5 text-muted text-end">Fuente: Equipo FateBound</p>
        </article>
    <?php else: ?>
        <div class="alert alert-danger text-center">
            Historia no encontrada. El ID proporcionado no es válido.
        </div>
    <?php endif; ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
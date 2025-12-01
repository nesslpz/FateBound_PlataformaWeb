<?php 
session_start();
require 'db_connect.php'; 

try {
    $personajes_query = $pdo->query("SELECT nombre, rol, descripcion, perfil_psicologico, imagen_url FROM personajes ORDER BY personaje_id");
    $personajes = $personajes_query->fetchAll();
} catch (PDOException $e) {
    $personajes = []; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes | FateBound</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="section-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">FATEBOUND</a>
        <a class="btn btn-outline-light ms-auto" href="index.php">← Volver al Inicio</a>
    </div>
</nav>

<section class="container py-5">
    <h1 class="text-center mb-5" style="color: #e0ac69;">Elenco de Consecuencias</h1>
    <p class="text-center lead text-muted mb-5">Conoce a los personajes cuyas vidas se entrelazan con tus decisiones.</p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if (!empty($personajes)): ?>
            <?php foreach ($personajes as $p): ?>
                <div class="col">
                    <div class="card card-dark shadow-lg h-100 p-3 text-center">
                        <?php if (!empty($p['imagen_url'])): ?>
                            <img src="img/<?php echo htmlspecialchars($p['imagen_url']); ?>" 
                                 class="card-img-top rounded-circle mx-auto mb-3" 
                                 alt="Imagen de <?php echo htmlspecialchars($p['nombre']); ?>" 
                                 style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #e0ac69;">
                        <?php endif; ?>

                        <div class="card-body p-0">
                            <h3 class="card-title mb-1" style="color: #e0ac69;"><?php echo htmlspecialchars($p['nombre']); ?></h3>
                            
                            <p class="card-subtitle mb-3 text-muted fw-bold"><?php echo htmlspecialchars($p['rol']); ?></p>
                            
                            <hr class="text-muted">

                            <div class="text-start mb-3">
                                <strong>Descripción General:</strong> 
                                <span class="text-light d-block mt-1"><?php echo nl2br(htmlspecialchars($p['descripcion'])); ?></span>
                            </div>
                            
                            <div class="text-start small">
                                <strong>Perfil Psicológico:</strong> 
                                <span class="text-light d-block mt-1"><?php echo nl2br(htmlspecialchars($p['perfil_psicologico'])); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12"><div class="alert alert-warning text-center">No se encontraron datos de personajes.</div></div>
        <?php endif; ?>
    </div>
</section>

<footer class="text-center text-white">
    <p class="mb-1">&copy; 2025 FateBound Project.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
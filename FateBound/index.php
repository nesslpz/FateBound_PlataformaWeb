<?php 
session_start(); // Siempre al inicio para manejar la sesión
require 'db_connect.php'; 

$GAME_URL = "#"; // Aquí se pondrá el link de descarga del videojuego una vez que salga.

// Obtener el estado de la sesión
$is_logged_in = isset($_SESSION['user_id']);
$current_username = $is_logged_in ? $_SESSION['username'] : '';

// CONSULTA para la BIBLIOTECA
try {
    $historias_query = $pdo->query("SELECT historia_id, titulo, resumen FROM historias_breves ORDER BY historia_id DESC");
    $historias = $historias_query->fetchAll();
} catch (PDOException $e) { 
    $historias = []; 
}

// CONSULTA para el FORO
try {
    $posts_query = $pdo->query("SELECT p.titulo, p.contenido, u.username 
                                 FROM publicaciones_foro p 
                                 JOIN usuarios u ON p.user_id = u.user_id 
                                 ORDER BY p.fecha_creacion DESC LIMIT 5");
    $posts = $posts_query->fetchAll();
} catch (PDOException $e) { 
    $posts = []; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FateBound | El Peso de las Decisiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">FATEBOUND</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="#biblioteca">BIBLIOTECA</a></li>
                    <li class="nav-item"><a class="nav-link" href="personajes.php">PERSONAJES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#comunidad">COMUNIDAD</a></li>

                    <?php if ($is_logged_in): ?>
                        <li class="nav-item"><span class="nav-link text-success">¡Hola, <?php echo htmlspecialchars($current_username); ?>!</span></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-2" href="cerrar_sesion.php">CERRAR SESIÓN</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-2" href="login.php">INICIAR SESIÓN</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary ms-2" href="registro.php">REGISTRARSE</a></li>
                    <?php endif; ?>

                    <li class="nav-item"><a class="nav-link btn btn-primary ms-2" href="<?php echo $GAME_URL; ?>" target="_blank">JUGAR</a></li> 
                </ul>
            </div>
        </div>
    </nav>

    <header id="inicio" class="py-5 text-center text-light section-dark" style="border-bottom: 5px solid #e0ac69;">
        <div class="container">
            <h1 class="display-1 fw-bold">FATEBOUND</h1>
            <p class="lead" style="color: #ccc;">
                Cada Elección Define Tu Destino. Un Viaje Narrativo hacia la Conciencia Ética y Emocional.
            </p>
            <a class="btn btn-primary btn-lg mt-4" href="<?php echo $GAME_URL; ?>" target="_blank">INICIAR EXPERIENCIA</a>

            <p class="text-muted mt-3"><small>
            </small></p>
        </div>
    </header>

    <section id="biblioteca" class="py-5 bg-light-dark section-dark">
        <div class="container">
            <h2 class="text-center mb-4">Biblioteca de Dilemas</h2>
            <p class="text-center mb-5 text-muted">
                Historias breves inspiradas en las decisiones que forjan la vida de Soren y Aveline. Haz clic para una reflexión más profunda.
            </p>
            
            <div class="row">
                <?php if (!empty($historias)): ?>
                    <?php foreach ($historias as $historia): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card card-dark shadow-lg h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($historia['titulo']); ?></h5>
                                    <p class="card-text text-muted"><?php echo htmlspecialchars($historia['resumen']); ?></p>
                                    
                                    <a href="leer_historia.php?id=<?php echo $historia['historia_id']; ?>" 
                                       class="btn btn-primary btn-sm mt-3">
                                        Leer Más
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No se encontraron historias en la base de datos.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="comunidad" class="py-5 section-dark" style="border-top: 1px solid #333;">
        <div class="container">
            <h2 class="text-center mb-4">El Foro de las Consecuencias</h2>
            <p class="text-center mb-5 text-muted">
                Comparte tus propias experiencias de toma de decisiones. Tu reflexión nutre la comunidad.
            </p>
            
            <div class="card card-dark mb-5 p-4 mx-auto" style="max-width: 800px;">
                <h5 class="card-title text-center" style="color: #e0ac69;">Publica tu Reflexión</h5>

                <?php if ($is_logged_in): ?>
                    <p class="text-center text-muted">Estás publicando como **<?php echo htmlspecialchars($current_username); ?>**</p>
                    <form action="post_handler.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control bg-dark text-light border-secondary" name="titulo" placeholder="Título de tu Experiencia" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control bg-dark text-light border-secondary" name="contenido" rows="4" placeholder="Describe tu reflexión personal..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary d-block mx-auto">COMPARTIR EN EL FORO</button>
                    </form>
                <?php else: ?>
                    <p class="text-center lead">
                        Debes **iniciar sesión** para publicar y participar en el diálogo.
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="login.php" class="btn btn-primary btn-lg px-4 gap-3">INICIAR SESIÓN</a>
                        <a href="registro.php" class="btn btn-outline-light btn-lg px-4">REGISTRARSE</a>
                    </div>
                <?php endif; ?>
            </div>

            <h4 class="mb-4 text-center">Últimas Intervenciones</h4>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <div class="card card-dark mb-3">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #e0ac69;"><?php echo htmlspecialchars($post['titulo']); ?></h5>
                                    <p class="card-text text-light"><?php echo nl2br(htmlspecialchars(substr($post['contenido'], 0, 200) . '...')); ?></p>
                                    <small class="text-muted">Publicado por **<?php echo htmlspecialchars($post['username']); ?>**</small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-muted">Aún no hay publicaciones en el foro.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

    <footer class="text-center text-white">
        <p class="mb-1">&copy; 2025 FateBound Project. Expotecmi - Ingeniería en Desarrollo de Software.</p>
        <p><small class="text-muted">Desarrollado con HTML5, PHP, Bootstrap y MySQL.</small></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
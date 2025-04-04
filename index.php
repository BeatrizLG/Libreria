<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';
?>

<div class="jumbotron bg-light p-5 rounded-lg m-3">
    <h1 class="display-4">Bienvenido a <?php echo SITE_TITLE; ?></h1>
    <p class="lead">Explora nuestra amplia colección de libros y descubre a tus autores favoritos.</p>
    <hr class="my-4">
    <p>Navega por nuestro catálogo y encuentra las mejores obras literarias.</p>
    <a class="btn btn-primary btn-lg" href="libros.php" role="button">Ver Libros</a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Libros Destacados</h5>
                <?php
                try {
                    $stmt = $pdo->query("SELECT * FROM libros ORDER BY RAND() LIMIT 3");
                    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo '<ul class="list-group">';
                    foreach ($libros as $libro) {
                        echo '<li class="list-group-item">' . htmlspecialchars($libro['titulo']) . '</li>';
                    }
                    echo '</ul>';
                } catch (PDOException $e) {
                    echo '<p class="text-danger">Error al cargar los libros destacados.</p>';
                }
                ?>
                <a href="libros.php" class="btn btn-outline-primary mt-3">Ver todos los libros</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Autores Destacados</h5>
                <?php
                try {
                    $stmt = $pdo->query("SELECT * FROM autores ORDER BY RAND() LIMIT 3");
                    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo '<ul class="list-group">';
                    foreach ($autores as $autor) {
                        echo '<li class="list-group-item">' . htmlspecialchars($autor['nombre']) . '</li>';
                    }
                    echo '</ul>';
                } catch (PDOException $e) {
                    echo '<p class="text-danger">Error al cargar los autores destacados.</p>';
                }
                ?>
                <a href="autores.php" class="btn btn-outline-primary mt-3">Ver todos los autores</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
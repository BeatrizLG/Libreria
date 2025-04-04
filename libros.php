<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';

try {
    $stmt = $pdo->query("SELECT libros.*, autores.nombre AS autor_nombre 
                         FROM libros 
                         JOIN autores ON libros.autor_id = autores.id");
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener los libros: " . $e->getMessage());
}
?>

<h1 class="mb-4">Listado de Libros</h1>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Año</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?php echo htmlspecialchars($libro['id']); ?></td>
                <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                <td><?php echo htmlspecialchars($libro['autor_nombre']); ?></td>
                <td><?php echo htmlspecialchars($libro['genero']); ?></td>
                <td><?php echo htmlspecialchars($libro['anio_publicacion']); ?></td>
                <td>$<?php echo number_format($libro['precio'], 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>
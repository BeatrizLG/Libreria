<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';

try {
    $stmt = $pdo->query("SELECT * FROM autores");
    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener los autores: " . $e->getMessage());
}
?>

<h1 class="mb-4">Listado de Autores</h1>

<div class="row">
    <?php foreach ($autores as $autor): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($autor['nombre']); ?></h5>
                <p class="card-text">
                    <strong>Nacionalidad:</strong> <?php echo htmlspecialchars($autor['nacionalidad']); ?><br>
                    <strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($autor['fecha_nacimiento']); ?>
                </p>
            </div>
            <div class="card-footer bg-transparent">
                <small class="text-muted">Libros publicados: 
                    <?php 
                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM libros WHERE autor_id = ?");
                    $stmt->execute([$autor['id']]);
                    echo $stmt->fetchColumn();
                    ?>
                </small>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';

$mensaje = '';
if (isset($_SESSION['mensaje_contacto'])) {
    $mensaje = $_SESSION['mensaje_contacto'];
    unset($_SESSION['mensaje_contacto']);
}
?>

<h1 class="mb-4">Formulario de Contacto</h1>

<?php if ($mensaje): ?>
<div class="alert alert-<?php echo strpos($mensaje, 'Error') !== false ? 'danger' : 'success'; ?>">
    <?php echo $mensaje; ?>
</div>
<?php endif; ?>

<form action="procesar_contacto.php" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
        <div class="invalid-feedback">
            Por favor ingresa tu nombre.
        </div>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico:</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <div class="invalid-feedback">
            Por favor ingresa un correo electrónico válido.
        </div>
    </div>
    
    <div class="mb-3">
        <label for="asunto" class="form-label">Asunto:</label>
        <input type="text" class="form-control" id="asunto" name="asunto" required>
        <div class="invalid-feedback">
            Por favor ingresa un asunto.
        </div>
    </div>
    
    <div class="mb-3">
        <label for="comentario" class="form-label">Comentario:</label>
        <textarea class="form-control" id="comentario" name="comentario" rows="5" required></textarea>
        <div class="invalid-feedback">
            Por favor ingresa tu comentario.
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<script>
// Validación del formulario
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>

<?php require_once 'includes/footer.php'; ?>
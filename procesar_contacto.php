<?php
require_once 'includes/config.php';
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contacto.php');
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$asunto = trim($_POST['asunto'] ?? '');
$comentario = trim($_POST['comentario'] ?? '');

// Validación básica
if (empty($nombre) || empty($email) || empty($asunto) || empty($comentario)) {
    $_SESSION['mensaje_contacto'] = 'Error: Todos los campos son requeridos.';
    header('Location: contacto.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['mensaje_contacto'] = 'Error: El correo electrónico no es válido.';
    header('Location: contacto.php');
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO contacto (fecha, nombre, email, asunto, comentario) 
                          VALUES (NOW(), ?, ?, ?, ?)");
    $stmt->execute([$nombre, $email, $asunto, $comentario]);
    
    $_SESSION['mensaje_contacto'] = '¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.';
} catch (PDOException $e) {
    $_SESSION['mensaje_contacto'] = 'Error al enviar el mensaje: ' . $e->getMessage();
}

header('Location: contacto.php');
exit;
?>
<?php
session_start();
// require_once 'conexion.php';
require_once '../db.php';

function limpiar($dato) {
    return htmlspecialchars(trim($dato));
}

// Verifica que haya sesión activa
if (!isset($_SESSION["usuario_id"])) {
    echo "<script>alert('Sesión no válida. Inicia sesión nuevamente.'); window.location.href='../html/iniciarSesion.html';</script>";
    exit;
}

$usuario_id = $_SESSION["usuario_id"];
$contrasena = limpiar($_POST['contrasena']);
$confirmar  = limpiar($_POST['confirmar_contrasena']);

// Validación adicional en servidor (ya validado en JS, pero doble capa)
if ($contrasena !== $confirmar) {
    echo "<script>alert('Las contraseñas no coinciden.'); window.location.href='../html/cambiarContrasena.php';</script>";
    exit;
}

// Hash de la nueva contraseña (usando SHA-256)
$contrasena_hash = hash('sha256', $contrasena);

try {
    // Iniciar transacción
    $conn->begin_transaction();

    // Actualizar contraseña en credenciales
    $stmt = $conn->prepare("UPDATE credenciales SET contrasena_hash = ?, fecha_envio_codigo = NOW() WHERE usuario_id = ?");
    $stmt->bind_param("si", $contrasena_hash, $usuario_id);
    $stmt->execute();
    $stmt->close();

    // Cambiar estado a 1 (activo)
    $stmt = $conn->prepare("UPDATE estado_usuario SET estado = 1 WHERE usuario_id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->close();

    // Confirmar cambios
    $conn->commit();

    echo "<script>alert('Contraseña actualizada exitosamente.'); window.location.href='../php/inicio.php';</script>";
} catch (Exception $e) {
    $conn->rollback();
    echo "Error al actualizar contraseña: " . $e->getMessage();
}
?>

<?php
session_start();
require_once 'conexion.php'; 

function limpiar($dato) {
    return htmlspecialchars(trim($dato));
}

// Obtener datos del formulario y sesión
$codigo_ingresado = limpiar($_POST['codigo']);
$usuario_id = $_SESSION["usuario_id"];

try {
    // Obtener código y fecha actual del usuario
    $stmt = $conn->prepare("SELECT codigo_verificacion, fecha_envio_codigo FROM credenciales WHERE usuario_id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($codigo_verificacion, $fecha_codigo);
        $stmt->fetch();
        $stmt->close();

        // Verificar que no haya expirado (30 minutos)
        $fecha_actual = new DateTime();
        $fecha_envio = new DateTime($fecha_codigo);
        $intervalo = $fecha_envio->diff($fecha_actual);
        $minutos = $intervalo->i + ($intervalo->h * 60);

        if ($minutos <= 30) {
            if ($codigo_ingresado === $codigo_verificacion) {
                // Cambiar el estado a 1 (activo)
                $stmt = $conn->prepare("UPDATE estado_usuario SET estado = 1 WHERE usuario_id = ?");
                $stmt->bind_param("i", $usuario_id);
                $stmt->execute();
                $stmt->close();

                echo "<script>alert('Cuenta verificada correctamente.'); window.location.href='inicio.php';</script>";
            } else {
                session_unset();
                session_destroy();
                echo "<script>alert('Código incorrecto. Inténtalo nuevamente.'); window.location.href='../html/validarCuenta.html';</script>";
            }
        } else {
            session_unset();
            session_destroy();
            echo "<script>alert('El código ha expirado. Se enviará uno nuevo.'); window.location.href='reenviarCodigo.php';</script>";
            exit;
        }

    } else {
        echo "<script>alert('Usuario no encontrado.'); window.location.href='../php/iniciarSesion.php';</script>";
    }
} catch (Exception $e) {
    echo "Error al verificar código: " . $e->getMessage();
}
?>

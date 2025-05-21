<?php
session_start();
require_once 'conexion.php';

function limpiar($dato) {
    return htmlspecialchars(trim($dato));
}

$nombre_usuario = limpiar($_POST['nombre_usuario']);
$contrasena     = limpiar($_POST['contrasena']);

try {
    // Buscar usuario, contraseña y estado
    $stmt = $conn->prepare("
        SELECT u.id, u.nombre, u.ap_paterno,u.ap_materno,c.contrasena_hash, eu.estado
        FROM usuarios u 
        JOIN credenciales c ON u.id = c.usuario_id 
        JOIN estado_usuario eu ON u.id = eu.usuario_id
        WHERE u.nombre_usuario = ?
    ");
    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($usuario_id, $nombre, $ap_paterno, $ap_materno,$hash_guardado, $estado);
        $stmt->fetch();

        if ($contrasena === $hash_guardado) {
            // Verificar estado de cuenta
            $_SESSION["usuario_id"] = $usuario_id;
            $_SESSION["nombre"] = $nombre . ' ' . $ap_paterno . ' ' . $ap_materno;
            $_SESSION["estado"] = $estado;

            if ($estado === 0) {
                echo "<script>window.location.href='../html/validarCuenta.html';</script>";
            } else if ($estado === 2) {
                echo "<script>window.location.href='../html/cambiarContrasena.html';</script>";
            } else if ($estado === 1) {
                echo "<script>window.location.href='../php/inicio.php';</script>";
            } else {
                echo "<script>alert('Estado de cuenta desconocido. Contacta soporte.'); window.location.href='../php/iniciarSesion.php';</script>";
            }
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='../php/iniciarSesion.php';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href='../php/iniciarSesion.php';</script>";
    }

    $stmt->close();
} catch (Exception $e) {
    echo "Error en el inicio de sesión: " . $e->getMessage();
}
?>

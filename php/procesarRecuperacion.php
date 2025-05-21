<?php
session_start();
// require_once 'conexion.php';
require_once '../db.php';

include __DIR__ . '/phpMailer/enviarCorreo.php';

function limpiar($dato) {
    return htmlspecialchars(trim($dato));
}

$nombre_usuario = limpiar($_POST['nombre_usuario']);

try {
    // Buscar usuario, contraseña y estado
    $stmt = $conn->prepare("
        SELECT u.id, u.correo, u.nombre, u.ap_paterno, u.ap_materno
        FROM usuarios u 
        WHERE u.nombre_usuario = ?
    ");

    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($usuario_id, $correo,$nombre,$ap_paterno,$ap_materno);
        $stmt->fetch();

        //generar contraseña temporal, actualizarla en la bd hasheada y enviarla por correo
        $contrasena_temporal = generarContrasenaSegura();
        $hash_temporal = hash('sha256', $contrasena_temporal);

        // Actualizar la contraseña en la tabla credenciales
        $stmt = $conn->prepare("UPDATE credenciales SET contrasena_hash = ?, fecha_envio_codigo = NOW() WHERE usuario_id = ?");
        $stmt->bind_param("si", $hash_temporal, $usuario_id);
        $stmt->execute();
        $stmt->close();

        // Cambiar estado a 2 = recuperando contraseña
        $stmt = $conn->prepare("UPDATE estado_usuario SET estado = 2 WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $stmt->close();

         // Enviar correo con la nueva contraseña
        $asunto = "Recuperación de contraseña - DIVAN";
        $mensaje = "
            <div style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px; border-radius: 10px; color: #333; max-width: 600px; margin: auto;'>
                <h2 style='color: #1a232c;'>Recuperación de contraseña - DIVAN</h2>
                <p>Hola <strong>$nombre $ap_paterno $ap_materno</strong>,</p>
                <p>Tu nueva contraseña temporal es:</p>
                <div style='margin: 30px 0; text-align: center;'>
                    <span style='font-size: 30px; background-color: #1a232c; color: white; padding: 12px 20px; border-radius: 8px;'>$contrasena_temporal</span>
                </div>
                <p>Inicia sesión y cámbiala inmediatamente.</p>
                <p style='font-size: 14px; color: #777;'>Saludos,<br>Soporte DIVAN</p>
                <p style='font-size: 14px; color: #1a232c; font-style: italic; text-align: center; margin-top: 20px;'><!--Se agrego-->
                “Protege tus datos, cifra tu mundo.”
            </p>
            <div style='text-align: center; margin-bottom: 20px;'>
                <img src='cid:Divan' alt='Logo DIVAN' style='height: 80px; border-radius: 12px;'><!--Se agrego-->
            </div>
            </div>
        ";

        if (enviarCorreo($correo, $asunto, $mensaje)) {
            echo "<script>alert('Se ha enviado una contraseña temporal a tu correo.'); window.location.href='../php/iniciarSesion.php';</script>";
        } else {
            echo "<script>alert('Error al enviar el correo. Intenta nuevamente.'); window.location.href='../html/recuperarContrasena.html';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href='../php/iniciarSesion.php';</script>";
    }

    $stmt->close();
} catch (Exception $e) {
    echo "Error en el inicio de sesión: " . $e->getMessage();
}



function generarContrasenaSegura($longitud = 8) {
    $mayus = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $minus = 'abcdefghijklmnopqrstuvwxyz';
    $numeros = '0123456789';
    $todos = $mayus . $minus . $numeros;

    // Garantizamos al menos uno de cada tipo
    $contrasena = $mayus[random_int(0, strlen($mayus) - 1)];
    $contrasena .= $minus[random_int(0, strlen($minus) - 1)];
    $contrasena .= $numeros[random_int(0, strlen($numeros) - 1)];

    // Rellenar el resto aleatoriamente
    for ($i = 3; $i < $longitud; $i++) {
        $contrasena .= $todos[random_int(0, strlen($todos) - 1)];
    }

    // Mezclar la contraseña para evitar el orden predecible
    return str_shuffle($contrasena);
}

?>

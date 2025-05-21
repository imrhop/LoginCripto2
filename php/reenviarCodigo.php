<?php
session_start();
require_once 'conexion.php';

require_once __DIR__ . '/phpMailer/enviarCorreo.php';

function limpiar($dato) {
    return htmlspecialchars(trim($dato));
}

$usuario_id = $_SESSION["usuario_id"];
$codigo_verificacion = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));

// Obtener datos del usuario
$stmt = $conn->prepare("SELECT correo, nombre, ap_paterno, ap_materno FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($correo, $nombre, $ap_paterno, $ap_materno);
    $stmt->fetch();
    $stmt->close();

    // Preparar y enviar el correo
    $asunto = "Verificación de Cuenta - DIVAN";
    $mensaje = "
        <div style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px; border-radius: 10px; color: #333; max-width: 600px; margin: auto;'>
            <h2 style='color: #1a232c;'>Verificación de Cuenta - DIVAN</h2>
            <p>Hola <strong>$nombre $ap_paterno $ap_materno</strong>,</p>

            <p>Gracias por registrarte en DIVAN. Para completar tu registro, por favor ingresa el siguiente código de verificación en tu próximo inicio de sesión dentro de los próximos 30 minutos:</p>

            <div style='margin: 30px 0; text-align: center;'>
                <span style='font-size: 36px; background-color: #1a232c; color: #ffffff; padding: 12px 25px; border-radius: 8px; display: inline-block; letter-spacing: 4px; font-weight: bold;'>
                    $codigo_verificacion
                </span>
            </div>

            <p>Este código es temporal. Si no solicitaste esta cuenta, puedes ignorar este correo.</p>

            <hr style='margin: 30px 0; border: none; border-top: 1px solid #ccc;'>

            <p style='font-size: 14px; color: #777;'>Saludos,<br>Soporte DIVAN</p>
             <p style='font-size: 14px; color: #1a232c; font-style: italic; text-align: center; margin-top: 20px;'><!--Se agrego-->
                “Protege tus datos, cifra tu mundo.”
            </p>
            <div style='text-align: center; margin-bottom: 20px;'>
                <img src='cid:Divan' alt='Logo DIVAN' style='height: 80px; border-radius: 12px;'><!--Se agrego-->
            </div>
        </div>
    ";

    if (!enviarCorreo($correo, $asunto, $mensaje)) {
        echo "<script>alert('Falló el envío del correo. Inténtelo nuevamente más tarde'); window.location.href='../php/iniciarSesion.php';</script>";
        exit;
    }

    // Actualizar el nuevo código y su fecha
    $fecha_envio = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("UPDATE credenciales SET codigo_verificacion = ?, fecha_envio_codigo = ? WHERE usuario_id = ?");
    $stmt->bind_param("ssi", $codigo_verificacion, $fecha_envio, $usuario_id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Se ha enviado un nuevo código de verificación.'); window.location.href='../html/validarCuenta.html';</script>";

} else {
    echo "<script>alert('Usuario no encontrado.'); window.location.href='../php/iniciarSesion.php';</script>";
}
?>

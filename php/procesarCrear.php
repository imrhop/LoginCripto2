<?php
require_once 'conexion.php';

include __DIR__ . '/phpMailer/enviarCorreo.php';

function limpiar($dato) {
    return htmlspecialchars(trim($dato));
}

// Obtener datos del formulario
$nombre_usuario = limpiar($_POST['nombre_usuario']);
$correo         = limpiar($_POST['correo']);
$contrasena     = limpiar($_POST['contrasena']);
$nombre         = limpiar($_POST['nombre']);
$ap_paterno     = limpiar($_POST['ap_paterno']);
$ap_materno     = limpiar($_POST['ap_materno']);

// Hashear la contraseña con SHA-256
$contrasena_hash = hash('sha256', $contrasena);

// Generar código de verificación
$codigo_verificacion = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
$fecha_envio = date('Y-m-d H:i:s');

try {
    // Verificar si el nombre de usuario o correo ya existen
    $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE nombre_usuario = ? OR correo = ?");
    $stmt->bind_param("ss", $nombre_usuario, $correo);
    $stmt->execute();
    $stmt->bind_result($existe);
    $stmt->fetch();
    $stmt->close();

    if ($existe > 0) {
        echo "<script>alert('El nombre de usuario o correo ya están registrados.'); window.location.href='../php/crearCuenta.php';</script>";
        exit;
    }

    // Iniciar transacción
    $conn->begin_transaction();

    // Insertar en usuarios
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, correo, nombre, ap_paterno, ap_materno) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre_usuario, $correo, $nombre, $ap_paterno, $ap_materno);
    $stmt->execute();
    $usuario_id = $conn->insert_id;
    $stmt->close();

    // Insertar en credenciales
    $stmt = $conn->prepare("INSERT INTO credenciales (usuario_id, contrasena_hash, codigo_verificacion, fecha_envio_codigo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $usuario_id, $contrasena_hash, $codigo_verificacion, $fecha_envio);
    $stmt->execute();
    $stmt->close();

    // Insertar en estado_usuario
    $estado_id = 0;
    $stmt = $conn->prepare("INSERT INTO estado_usuario (usuario_id, estado) VALUES (?, ?)");
    $stmt->bind_param("ii", $usuario_id, $estado_id);
    $stmt->execute();
    $stmt->close();

    $conn->commit();

    // Preparar y enviar el correo
    $asunto = "Verificación de Cuenta - DIVAN";
    $mensaje = "
        <div style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px; border-radius: 10px; color: #333; max-width: 600px; margin: auto;'>
            <h2 style='color: #1a232c;'>Verificación de Cuenta - DIVAN</h2>
            <p>Hola <strong>$nombre $ap_paterno $ap_materno</strong>,</p>

            <p>Gracias por registrarte en DIVAN. Para completar tu registro, por favor ingresa el siguiente código de verificación en tu próximo inicio de sesión dentro de los proximos 30 minutos:</p>

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
        echo "<script>alert('Cuenta creada, pero falló el envío del correo.'); window.location.href='../php/iniciarSesion.php';</script>";
        exit;
    }

    echo "<script>alert('Cuenta creada exitosamente. Se ha enviado un código de verificación.'); window.location.href='../php/iniciarSesion.php';</script>";

} catch (Exception $e) {
    $conn->rollback();
    echo "Error al registrar usuario: " . $e->getMessage();
}
?>

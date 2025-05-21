<?php

require __DIR__ . '/src/Exception.php';
require __DIR__ . '/src/PHPMailer.php';
require __DIR__ . '/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo($email, $asunto, $mensaje) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 0; // Nivel de depuración
        $mail->Debugoutput = 'html'; // Salida de depuración en formato HTML
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'escomcriptografia@gmail.com'; // Tu correo de Gmail
        $mail->Password = 'pqsnrfizkizyvfbv'; // Clave de aplicación generada en Google
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('escomcriptografia@gmail.com', 'Soporte DIVAN');
        $mail->addAddress($email);
        $rutaLogo = __DIR__ . '/../../img/Divan.png';//Se agrego ruta del logo 
        if (file_exists($rutaLogo)) {
            $mail->AddEmbeddedImage($rutaLogo, 'Divan');//logo
        }

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->AltBody = strip_tags($mensaje); // Mensaje en texto plano

        // Enviar el correo
        $mail->send();
        return ['success' => true, 'message' => 'Correo enviado correctamente.'];
    } catch (Exception $e) {
        return ['success' => false, 'message' => $mail->ErrorInfo];
    }
}


?>
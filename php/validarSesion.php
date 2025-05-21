<?php
session_start();

// Si ya hay una sesión iniciada, redirige al inicio del sistema
if (isset($_SESSION["usuario_id"])) {
    if ($_SESSION["estado"] === 1) {
        header("Location: inicio.php");
    } else if ($_SESSION["estado"] === 2) {
        header("Location: ../html/cambiarContrasena.html");
    } else {
        header("Location: ../html/validarCuenta.html");
    }
    exit;
}
?>

<?php
session_start();

// Si ya hay una sesión iniciada, redirige al inicio del sistema
if (isset($_SESSION["usuario_id"])) {
    header("Location: inicio.php");
    exit;
}
?>

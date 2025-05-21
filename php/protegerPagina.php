<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../html/iniciarSesion.php");
    exit;
}
?>

<?php
// Datos de conexión
$host = "localhost";
$usuario = "root";           // Por defecto en XAMPP es 'root'
$contrasena = "";            // Sin contraseña por defecto
$base_datos = "cryptologin";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Opcional: configurar charset
$conn->set_charset("utf8");
?>

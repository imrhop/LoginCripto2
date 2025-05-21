<?php
$host = getenv("DB_HOST");
$user = getenv("DB_USER");
$pass = getenv("DB_PASS");
$db   = getenv("DB_NAME");

// Mostrar el valor de cada variable
echo "DB_HOST: " . $host . "<br>";
echo "DB_USER: " . $user . "<br>";
echo "DB_PASS: " . $pass . "<br>";
echo "DB_NAME: " . $db . "<br>";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

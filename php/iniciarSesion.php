<?php include 'validarSesion.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar Sesión</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="navbar">
		<a href="../index.html" class="logo"><img src="../img/Divan.png"></a>
		<div class="navbar-links">
	        <a href="crearCuenta.php">Crear Cuenta</a>
	        <a href="recuperarContrasena.php">Recuperar Contraseña</a>
	    </div>
	</div>
	<h2>Iniciar Sesión</h2>
	<form action="../php/procesarLogin.php" method="POST">
		<label for="nombre_usuario">Nombre de Usuario:</label><br>
		<input type="text" id="nombre_usuario" name="nombre_usuario" required><br><br>

		<label for="contrasena">Contraseña:</label><br>
		<input type="password" id="contrasena" name="contrasena" required><br><br>

		<a href="recuperarContrasena.php">¿Olvidaste tu contraseña?</a><br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
<?php include 'validarSesion.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar Sesión</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/HashContra.js"></script>
</head>
<body>
	<div class="navbar">
		<a href="../index.php" class="logo"><img src="../img/Divan.png"></a>
		<p style=' color: #ffffff;font-style: italic; text-align: center; margin-top: 20px; margin-left: 5px;'>
                Protege tus datos, cifra tu mundo
        	</p>
		<div class="navbar-links">
	        <a href="crearCuenta.php">Crear Cuenta</a>
	        <a href="recuperarContrasena.php">Recuperar Contraseña</a>
	    </div>
	</div>
	<h2>Iniciar Sesión</h2>
	<form action="../php/procesarLogin.php" method="POST" id="formLogin">
		<label for="nombre_usuario">Nombre de Usuario:</label><br>
		<input type="text" id="nombre_usuario" name="nombre_usuario" required><br><br>

		<label for="contrasena">Contraseña:</label><br>
		<input type="password" id="contrasena" name="contrasena_input" required><br><br>
		 <input type="hidden" id="contrasena_hashed" name="contrasena">

		<a href="recuperarContrasena.php">¿Olvidaste tu contraseña?</a><br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
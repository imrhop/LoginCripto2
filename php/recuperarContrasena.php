<?php include 'validarSesion.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recuperar Contraseña</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="navbar">
		<a href="../index.html" class="logo"><img src="../img/Divan.png"></a>
		<div class="navbar-links">
	        <a href="iniciarSesion.php">Iniciar Sesión</a>
	        <a href="crearCuenta.php">Crear Cuenta</a>
	    </div>
	</div>
	<h2>Recuperar Contraseña</h2>
	<form action="../php/procesarRecuperacion.php" method="POST">
		<label for="nombre_usuario">Nombre de Usuario:</label><br>
		<input type="text" id="nombre_usuario" name="nombre_usuario" required
		       pattern="^[a-zA-Z0-9_]{5,15}$"
		       title="Debe tener entre 5 y 15 caracteres, solo letras, números o guiones bajos."><br><br>

		<input type="submit" value="Enviar">
	</form>
</body>
</html>
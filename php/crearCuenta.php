<?php include 'validarSesion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear cuenta</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
	<script>
		function validarContrasenas() {
			const pass1 = document.getElementById("contrasena").value;
			const pass2 = document.getElementById("confirmar_contrasena").value;
			if (pass1 !== pass2) {
				alert("Las contraseñas no coinciden.");
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	<div class="navbar">
	    <a href="../index.html" class="logo">
	        <img src="../img/Divan.png" alt="Logo DIVAN">
			<p style=' color: #ffffff;font-style: italic; text-align: center; margin-top: 20px; margin-left: 5px;'><!--Se agrego-->
                Protege tus datos, cifra tu mundo
        	</p>
	    </a>
	    <div class="navbar-links">
	        <a href="iniciarSesion.php">Iniciar Sesión</a>
	        <a href="recuperarContrasena.php">Recuperar Contraseña</a>
	    </div>
	</div>

	<h2>Crear Cuenta</h2>

	<form action="../php/procesarCrear.php" method="POST" onsubmit="return validarContrasenas();">
		<label for="nombre_usuario">Nombre de Usuario:</label><br>
		<input type="text" id="nombre_usuario" name="nombre_usuario" required
		       pattern="^[a-zA-Z0-9_]{5,15}$"
		       title="Debe tener entre 5 y 15 caracteres, solo letras, números o guiones bajos."><br><br>

		<label for="correo">Correo Electrónico:</label><br>
		<input type="email" id="correo" name="correo" required><br><br>

		<label for="contrasena">Contraseña:</label><br>
		<input type="password" id="contrasena" name="contrasena" required
		       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
		       title="Debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula y un número."><br><br>

		<label for="confirmar_contrasena">Confirmar Contraseña:</label><br>
		<input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required><br><br>

		<label for="nombre">Nombre:</label><br>
		<input type="text" id="nombre" name="nombre" required><br><br>

		<label for="ap_paterno">Apellido Paterno:</label><br>
		<input type="text" id="ap_paterno" name="ap_paterno" required><br><br>

		<label for="ap_materno">Apellido Materno:</label><br>
		<input type="text" id="ap_materno" name="ap_materno" required><br><br>

		<input type="submit" value="Enviar">
	</form>
</body>
</html>

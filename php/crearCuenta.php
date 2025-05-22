<?php include 'validarSesion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear cuenta</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/validarDatos.js"></script>
</head>
<body>
	<div class="navbar">
	    <a href="../index.php" class="logo">
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

	<form action="../php/procesarCrear.php" method="POST" id="formCrearCuenta">
    <!-- Tus inputs visibles normales -->
    <label for="nombre_usuario">Nombre de Usuario:</label><br>
    <input type="text" id="nombre_usuario" name="nombre_usuario" required
           pattern="^[a-zA-Z0-9_]{5,15}$"
           title="Debe tener entre 5 y 15 caracteres, solo letras, números o guiones bajos."><br><br>

    <label for="correo">Correo Electrónico:</label><br>
    <input type="email" id="correo" name="correo" required><br><br>

    <!-- Aquí los inputs visibles para que el usuario escriba la contraseña -->
    <label for="contrasena">Contraseña:</label><br>
    <input type="password" id="contrasena" name="contrasena_input" required
           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
           title="La contraseña ingresada debe como mínimo tener 8 caracteres, 1 mayúscula, 1 minúscula, 1 número, 1 carácter especial y no deben de tener caracteres iguales consecutivos"><br><br>

    <label for="confirmar_contrasena">Confirmar Contraseña:</label><br>
    <input type="password" id="confirmar_contrasena" name="confirmar_contrasena_input" required><br><br>

    <!-- Inputs ocultos donde pondrás el hash -->
    <input type="hidden" id="contrasena_hashed" name="contrasena">
    <input type="hidden" id="confirmar_contrasena_hashed" name="confirmar_contrasena">

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

<?php
$token = $_GET['token'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cambiar contraseña</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/RecuperVali.js"></script>
</head>
<body>
	<div class="navbar">
	    <a href="" class="logo">
	        <img src="../img/Divan.png" alt="Logo DIVAN">
			<p >Protege tus datos, cifra tu mundo. Únete a nuestra plataforma segura.</p>
	    </a>
	</div>

	<h2>Cambiar contraseña</h2>

	<form action="../php/actualizarContrasena.php" method="POST" id="formContra" >
	
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="contrasena">Nueva contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena_input" required
           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
           title="La contraseña ingresada debe como mínimo tener 8 caracteres, 1 mayúscula, 1 minúscula, 1 número, 1 carácter especial y no deben de tener caracteres iguales consecutivos"><br><br>

        <label for="confirmar_contrasena">Confirmar Contraseña:</label><br>
        <input type="password" id="confirmar_contrasena" name="confirmar_contrasena_input" required><br><br>

        <!-- Inputs ocultos donde pondrás el hash -->
        <input type="hidden" id="contrasena_hashed" name="contrasena">
        <input type="hidden" id="confirmar_contrasena_hashed" name="confirmar_contrasena">


		<input type="submit" value="Enviar">
	</form>
</body>
</html>

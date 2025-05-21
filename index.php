<?php ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Criptografía</title>
	<link rel="icon" href="img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="navbar">
	    <a href="" class="logo">
	        <img src="img/Divan.png" alt="Logo DIVAN">
			<p style=' color: #ffffff;font-style: italic; text-align: center; margin-top: 20px; margin-left: 5px;'>
                Protege tus datos, cifra tu mundo
        	</p>
	    </a>
	    <div class="navbar-links">
	        <a href="php/iniciarSesion.php">Iniciar Sesión</a>
	        <a href="php/crearCuenta.php">Crear Cuenta</a>
	        <a href="php/recuperarContrasena.php">Recuperar Contraseña</a>
	    </div>
	</div>

	<div  style="text-align:center; padding: 40px;">
   	 <h1>Bienvenido a DIVAN</h1>
     <p>Protege tus datos, cifra tu mundo. Únete a nuestra plataforma segura.</p>
	</div>
<div  style="text-align:center; padding-bottom: 40px;">
   		<h2>La importancia del Hash en la Criptografía</h2>
  		<p>
    		En criptografía, las funciones hash juegan un papel fundamental para garantizar la integridad y seguridad de los datos. Un hash es una función que transforma cualquier entrada en una cadena fija de caracteres, única para esa entrada específica. Esto permite verificar que la información no ha sido alterada, ya que cualquier cambio mínimo en el mensaje genera un hash completamente diferente.
  		</p>
  		<p>
    		Además, los hashes se utilizan en la protección de contraseñas, firmas digitales y en la creación de códigos de verificación. Al emplear algoritmos seguros como SHA-256, se asegura que no sea posible reconstruir el mensaje original a partir del hash, manteniendo así la confidencialidad y autenticidad en las comunicaciones digitales.
  		</p>
	</div>


	<div class="video-container">
        <iframe
            src="https://www.youtube.com/embed/7Dsyrs18ZR0"
            title="Video DIVAN"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>

	
</body>
</html>
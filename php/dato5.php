<?php include 'protegerPagina.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dato 5</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="navbar">
		<a href="inicio.php" class="logo"><img src="../img/Divan.png"></a>
		<p style="font-size: 10px;">Protege tus datos, cifra tu mundo. Únete a nuestra plataforma segura.</p>
		<h1>Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
		<div class="navbar-links">
			<a href="">Descargar PDF</a>
	        <a href="../php/cerrarSesion.php">Cerrar Sesión</a>
	    </div>
	</div>

	<div class="barra">
		<a href="inicio.php">Dato 1</a>
		<a href="dato2.php">Dato 2</a>
		<a href="dato3.php">Dato 3</a>
		<a href="dato4.php">Dato 4</a>
		<a href="">Dato 5</a>
	</div>
	<div>
		<h1>DATO 5</h1>
		<h2>Criptografía cuántica: más allá de lo clásico</h2>
		<p>¿Qué es la criptografía cuántica?<br>
Una rama de la criptografía que utiliza principios de la mecánica cuántica para lograr comunicaciones seguras, principalmente a través del protocolo BB84 (desarrollado por Bennett y Brassard en 1984).
<br>
Principio clave:
<r>
El teorema de no clonación cuántica establece que no se puede copiar un estado cuántico desconocido sin alterarlo.
Esto significa que si alguien intercepta un mensaje cuántico (por ejemplo, una clave enviada mediante fotones), el receptor detectará el espionaje, ya que los estados cuánticos cambiarán.
<br>
Aplicación actual:
<br>
Empresas y gobiernos (como China, EE.UU., y Suiza) ya han hecho transmisiones cuánticas experimentales.
<br>
El satélite cuántico Micius, lanzado por China, logró cifrado cuántico entre continentes.</p>
	</div>
	


</body>
</html>
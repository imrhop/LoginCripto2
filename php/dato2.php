<?php include 'protegerPagina.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dato 2</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="navbar">
		<a href="inicio.php" class="logo"><img src="../img/Divan.png"></a>
		<p style="font-size: 10px;">Protege tus datos, cifra tu mundo.</p>
		<h1>Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
		<div class="navbar-links">
			<a href="">Descargar PDF</a>
	        <a href="../php/cerrarSesion.php">Cerrar Sesión</a>
	    </div>
	</div>

	<div class="barra">
		<a href="inicio.php">Dato 1</a>
		<a href="">Dato 2</a>
		<a href="dato3.php">Dato 3</a>
		<a href="dato4.php">Dato 4</a>
		<a href="dato5.php">Dato 5</a>
	</div>
	<div>
		<h1>DATO 2</h1>
		<h2>Enigma y Alan Turing: el criptohéroe de la historia</h2>
		<p>¿Qué era la Enigma?
			<br>
Una máquina electromecánica de cifrado utilizada por los nazis. Su complejidad radicaba en el uso de tres o más rotores configurables que alteraban la sustitución de letras en cada pulsación, y en un plugboard (tablero de conexiones) que intercambiaba pares de letras antes del cifrado principal.
<br>
Número estimado de configuraciones posibles:
<br>
Más de 150 trillones (10¹⁴), sin contar las variaciones diarias de configuración.
<br>
¿Cómo lo rompió Turing?
<br>
Alan Turing y su equipo en Bletchley Park diseñaron una máquina llamada Bombe, inspirada en un diseño polaco anterior (la bomba kryptologiczna), que usaba principios de lógica booleana y circuitos eléctricos para descartar configuraciones imposibles rápidamente.
Utilizaban también cribs (fragmentos de texto que se asumía aparecían en los mensajes, como "Heil Hitler") para reducir las combinaciones.
<br>
Impacto histórico:
<br>
Acortó la Segunda Guerra Mundial entre 2 y 4 años.

Salvó entre 14 y 21 millones de vidas humanas, según estimaciones históricas.

Fue la base conceptual para las primeras computadoras digitales modernas.</p>
	</div>
	


</body>
</html>
<?php include 'protegerPagina.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dato 1</title>
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
		<a href="">Dato 1</a>
		<a href="dato2.php">Dato 2</a>
		<a href="dato3.php">Dato 3</a>
		<a href="dato4.php">Dato 4</a>
		<a href="dato5.php">Dato 5</a>
	</div>
	<div>
		<h1>DATO 1</h1>
		<h2>El cifrado César: simple pero histórico</h2>
		<p>¿Qué es?<br>
Un cifrado de sustitución monoalfabética en el que cada letra del mensaje original se reemplaza por otra que se encuentra un número fijo de posiciones adelante en el alfabeto.
<br>
Ejemplo:<br>
Si el desplazamiento es de 3:
<br>
-A → D
<br>
-B → E
<br>
...
<br>
-Z → C
<br>
Uso por Julio César:
<br>
Julio César lo usó para enviar órdenes a sus generales. El desplazamiento que usaba era generalmente de 3 posiciones, y el mensaje se escribía sin espacios ni puntuación, lo que añadía un poco de dificultad.
<br>
Vulnerabilidad:
<br>
Con solo 25 posibles desplazamientos (26 si contamos el 0, que no cifra), es extremadamente fácil de romper hoy. Cualquier software puede hacer una fuerza bruta probando todas las posibilidades, o incluso análisis de frecuencia para identificar patrones lingüísticos comunes (como que la letra "E" es la más frecuente en inglés).
<br>
Curioso:
<br>
A pesar de ser inseguro hoy, el cifrado César fue una revolución en su tiempo, y es la base de muchas técnicas criptográficas posteriores. Incluso se enseña en cursos introductorios de criptografía por su valor histórico.</p>
	</div>
	


</body>
</html>
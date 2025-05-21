<?php include 'protegerPagina.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dato 3</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="navbar">
		<a href="inicio.php" class="logo"><img src="../img/Divan.png"></a>
		<h1>Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
		<div class="navbar-links">
			<a href="">Descargar PDF</a>
	        <a href="../php/cerrarSesion.php">Cerrar Sesión</a>
	    </div>
	</div>

	<div class="barra">
		<a href="dato1.php">Dato 1</a>
		<a href="dato2.php">Dato 2</a>
		<a href="">Dato 3</a>
		<a href="dato4.php">Dato 4</a>
		<a href="dato5.php">Dato 5</a>
	</div>
	<div>
		<h1>DATO 3</h1>
	</div>
	


</body>
</html>
<?php include 'protegerPagina.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dato 4</title>
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
		<a href="">Dato 4</a>
		<a href="dato5.php">Dato 5</a>
	</div>
	<div>
		<h1>DATO 4</h1>
		<h2>Wei Dai y el proto-Bitcoin</h2>
		<p>¿Quién es Wei Dai?<br>
Un criptógrafo e ingeniero que en 1998 propuso un sistema de dinero digital descentralizado y anónimo llamado b-money.
<br>
Características adelantadas a su época:
<br>
-Sistema sin una autoridad central.
<br>
-Prueba de trabajo (Proof-of-Work).
<br>
-Uso de identidades digitales verificables.
<br>
-Libro contable compartido entre participantes.
<br>
¿Qué pasó con b-money?
<br>
Nunca se implementó como software funcional, pero el whitepaper de Bitcoin cita explícitamente a b-money, mostrando que Satoshi Nakamoto se basó en su propuesta.
<br>
Dato curioso:
<br>
Wei Dai y Nick Szabo (creador de otra moneda virtual, Bit Gold) son considerados por algunos como posibles candidatos a ser Satoshi Nakamoto, aunque ambos lo han negado.

</p>
	</div>
	


</body>
</html>
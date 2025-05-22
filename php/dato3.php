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
		<a href="">Dato 3</a>
		<a href="dato4.php">Dato 4</a>
		<a href="dato5.php">Dato 5</a>
	</div>
	<div>
		<h1>DATO 3</h1>
		<h2>WhatsApp, Signal y el cifrado moderno</h2>
		<p>Qué protocolo usan?<br>
WhatsApp utiliza el Signal Protocol, creado por Open Whisper Systems. Este protocolo implementa cifrado de extremo a extremo usando un enfoque de criptografía asimétrica y claves efímeras.
<br>
Componentes clave del protocolo:
<br>
Double Ratchet Algorithm: para generar nuevas claves en cada mensaje, dificultando ataques por intercepción.

X3DH (Extended Triple Diffie-Hellman): para el intercambio inicial de claves.

AES-256 y Curve25519: algoritmos utilizados para cifrar el contenido y las claves.
<br>
¿Por qué es polémico?<br>
Muchos gobiernos (Reino Unido, Australia, India, entre otros) han presionado para incluir backdoors (puertas traseras) en sistemas cifrados, lo que permitiría acceso a mensajes "en caso necesario".
<br>
Problema:
<br>
Crear una puerta trasera equivale a debilitar todo el sistema, porque si un atacante o grupo malicioso accede a esa entrada secreta, toda la privacidad de los usuarios queda comprometida.</p>
	</div>
	


</body>
</html>
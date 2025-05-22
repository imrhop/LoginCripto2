<?php include 'protegerPagina.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dato 5</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="navbar">
		<a href="inicio.php" class="logo"><img src="../img/Divan.png" alt="Logo"></a>
		<p style="font-size: 10px;">Protege tus datos, cifra tu mundo. Únete a nuestra plataforma segura.</p>
		<h1>Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
		<div class="navbar-links">
			<a href="#" onclick="descargarPDF()">Descargar PDF</a>
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

	<div id="contenido-pdf5">
		<h1>DATO 5</h1>
		<h2>Criptografía cuántica: más allá de lo clásico</h2>

		<h3>¿Qué es la criptografía cuántica?</h3>
		<p>
			Es una rama de la criptografía que utiliza principios de la <strong>mecánica cuántica</strong> para lograr comunicaciones seguras. Su base principal es el <strong>protocolo BB84</strong>, desarrollado por Bennett y Brassard en 1984.
		</p>

		<div>
			<img src="../img/ibm-cuantico2.jpg" alt="Computadora cuántica IBM" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>
		
		<h4>Principio clave</h4>
		<p>
			El <strong>teorema de no clonación cuántica</strong> establece que no se puede copiar un estado cuántico desconocido sin alterarlo. Esto significa que si alguien intercepta un mensaje cuántico —por ejemplo, una clave enviada mediante fotones— el receptor podrá detectar el espionaje, ya que los estados cuánticos se verán modificados.
		</p>
		
		<div>
			<img src="../img/cuan.jpg" alt="Diagrama de criptografía cuántica" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>

		<h3>Aplicación actual</h3>
		<ul>
			<li>Gobiernos y empresas de <strong>China, EE.UU. y Suiza</strong> han realizado <strong>transmisiones cuánticas experimentales</strong>.</li>
			<li>El <strong>satélite cuántico Micius</strong>, lanzado por China, logró establecer un sistema de <strong>cifrado cuántico entre continentes</strong>.</li>
		</ul>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
	<script>
	function descargarPDF() {
		const original = document.getElementById("contenido-pdf5");
		const clon = original.cloneNode(true);

		// Aplicar color negro a todo el texto
		clon.querySelectorAll("*").forEach(el => {
			el.style.color = "black";
		});

		// Crear encabezado para el PDF
		const encabezado = document.createElement("div");
		encabezado.style.textAlign = "center";
		encabezado.style.marginBottom = "20px";

		const logo = document.createElement("img");
		logo.src = "../img/Divan.png";
		logo.style.height = "80px";
		logo.style.marginBottom = "10px";
		encabezado.appendChild(logo);

		const slogan = document.createElement("p");
		slogan.textContent = "Protege tus datos, cifra tu mundo.";
		slogan.style.fontStyle = "italic";
		slogan.style.fontSize = "14px";
		slogan.style.color = "black";
		encabezado.appendChild(slogan);

		clon.insertBefore(encabezado, clon.firstChild);

		// Generar y descargar PDF
		html2pdf().set({
			margin: 0.5,
			filename: 'dato5_completo.pdf',
			image: { type: 'jpeg', quality: 0.98 },
			html2canvas: { scale: 2 },
			jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
		}).from(clon).save();
	}
	</script>
</body>
</html>

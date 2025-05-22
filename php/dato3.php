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
			<a href="#" onclick="descargarPDF()">Descargar PDF</a>
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
	
	
<div id="contenido-pdf3">
	<h1>DATO 3</h1>
	<h2>WhatsApp, Signal y el cifrado moderno</h2>
		<div>
			<img src="../img/wlogo.png" alt=" logo" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>
	<h3>¿Qué protocolo usan?</h3>
	<p>
		<strong>WhatsApp</strong> utiliza el <strong>Signal Protocol</strong>, creado por Open Whisper Systems. Este protocolo implementa cifrado de extremo a extremo mediante criptografía asimétrica y claves efímeras.
	</p>

	<h4>Componentes clave del protocolo:</h4>
	<ul>
		<li><strong>Double Ratchet Algorithm:</strong> genera nuevas claves en cada mensaje, dificultando la intercepción.</li>
		<li><strong>X3DH (Extended Triple Diffie-Hellman):</strong> permite el intercambio inicial de claves.</li>
		<li><strong>AES-256</strong> y <strong>Curve25519:</strong> algoritmos utilizados para cifrar el contenido y las claves.</li>
	</ul>

	<h3>¿Por qué es polémico?</h3>
	<p>
		Muchos gobiernos (como <strong>Reino Unido, Australia e India</strong>) han presionado para incluir <em>backdoors</em> (puertas traseras) en los sistemas cifrados, que permitirían acceso a los mensajes "en caso necesario".
	</p>

	<h4>¿Cuál es el problema?</h4>
	<p>
		Crear una puerta trasera equivale a <strong>debilitar todo el sistema</strong>, ya que si un atacante logra acceder a esa entrada, la privacidad de todos los usuarios se ve comprometida.
	</p>

	<div>
			<img src="../img/backdoor.jpg" alt=" logo" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function descargarPDF() {
	const original = document.getElementById("contenido-pdf3");
	const clon = original.cloneNode(true);

	// Aplicar color negro al texto del clon (sin afectar la página)
	clon.querySelectorAll("*").forEach(el => {
		el.style.color = "black";
	});

	// Agregar logo y slogan al encabezado del PDF
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

	// Generar el PDF con html2pdf
	html2pdf().set({
		margin: 0.5,
		filename: 'dato3_completo.pdf',
		image: { type: 'jpeg', quality: 0.98 },
		html2canvas: { scale: 2 },
		jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
	}).from(clon).save();
}
</script>




</body>
</html>
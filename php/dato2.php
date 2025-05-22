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
			<a href="#" onclick="descargarPDF()">Descargar PDF</a>
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
	<div id="contenido-pdf2">
		<h1>DATO 2</h1>
		<h2>Enigma y Alan Turing: el criptohéroe de la historia</h2>

		<h3>¿Qué era la Enigma?</h3>
		<p>
			Una <strong>máquina electromecánica de cifrado</strong> utilizada por los nazis. Su complejidad radicaba en el uso de tres o más rotores configurables que alteraban la sustitución de letras en cada pulsación, y en un plugboard (tablero de conexiones) que intercambiaba pares de letras antes del cifrado principal.
		</p>
		<div>
			<img src="../img/enigma.jpg" alt="Máquina Enigma" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>

		<h3>¿Cuántas configuraciones posibles?</h3>
		<p>
			Más de <strong>150 trillones</strong> (10¹⁴), sin contar las variaciones diarias de configuración.
		</p>

		<h3>¿Cómo lo rompió Turing?</h3>
		<p>
			Alan Turing y su equipo en <strong>Bletchley Park</strong> diseñaron una máquina llamada <strong>Bombe</strong>, inspirada en un diseño polaco anterior (la bomba kryptologiczna). Usaba lógica booleana y electricidad para descartar configuraciones imposibles rápidamente.
		</p>
		<p>
			También utilizaban <em>cribs</em> (fragmentos de texto que se creía aparecían en los mensajes, como <strong>"Heil Hitler"</strong>) para reducir las combinaciones.
		</p>

		<div>
			<img src="../img/turing.jpg" alt="Alan Turing"style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>

		<h3>Impacto histórico</h3>
		<ul>
			<li>Acortó la Segunda Guerra Mundial entre 2 y 4 años.</li>
			<li>Salvó entre <strong>14 y 21 millones de vidas humanas</strong>, según estimaciones.</li>
			<li>Fue la base conceptual para las primeras computadoras digitales modernas.</li>
		</ul>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
	<script>
function descargarPDF() {
	const original = document.getElementById("contenido-pdf2");
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
		filename: 'dato2_completo.pdf',
		image: { type: 'jpeg', quality: 0.98 },
		html2canvas: { scale: 2 },
		jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
	}).from(clon).save();
}
</script>


</body>
</html>
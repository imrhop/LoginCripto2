<?php include 'protegerPagina.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dato 1</title>
	<link rel="icon" href="../img/logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

	<div class="navbar">
		<a href="inicio.php" class="logo">
			<img src="../img/Divan.png" alt="Logo">
		</a>
		<p style="font-size: 10px;">Protege tus datos, cifra tu mundo.</p>
		<h1>Bienvenido <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
		<div class="navbar-links">
			<a href="#" onclick="descargarPDF()">Descargar PDF</a>
			<a href="../php/cerrarSesion.php">Cerrar Sesión</a>
		</div>
	</div>


	<div class="barra">
		<a href="#">Dato 1</a>
		<a href="dato2.php">Dato 2</a>
		<a href="dato3.php">Dato 3</a>
		<a href="dato4.php">Dato 4</a>
		<a href="dato5.php">Dato 5</a>
	</div>

	<!-- CONTENIDO PRINCIPAL -->
	<div id="contenido-pdf" class="contenido">
		<h1>DATO 1</h1>
		<h2>El cifrado César: simple pero histórico</h2>

		<h3>¿Qué es?</h3>
		<p>
			Un <strong>cifrado de sustitución monoalfabética</strong> en el que cada letra del mensaje original se reemplaza por otra que se encuentra un número fijo de posiciones adelante en el alfabeto.
		</p>

		<div>
			<img src="../img/cifrador.jpg" alt="Cifrador César" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>

		<h3>Ejemplo (desplazamiento de 3):</h3>
		<ul>
			<li>A → D</li>
			<li>B → E</li>
			<li>...</li>
			<li>Z → C</li>
		</ul>

		<h3>Uso por Julio César</h3>
		<p>
			Julio César lo usaba para enviar órdenes a sus generales. El desplazamiento común era de <strong>3 posiciones</strong>. Además, el mensaje se escribía sin espacios ni puntuación, lo que añadía un poco de dificultad extra.
		</p>

		<div>
			<img src="../img/cesar.jpg" alt="Julio César" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>

		<h3>Vulnerabilidad</h3>
		<p>
			Con solo <strong>25 posibles desplazamientos</strong> (26 si se cuenta el 0, que no cifra), es extremadamente fácil de romper actualmente. Se puede aplicar:
		</p>
		<ul>
			<li>Fuerza bruta probando todas las posibilidades.</li>
			<li>Análisis de frecuencia para identificar patrones lingüísticos (por ejemplo, la letra "E" es la más común en inglés).</li>
		</ul>

		<h3>Dato curioso</h3>
		<p>
			A pesar de ser inseguro hoy en día, el cifrado César fue una revolución en su tiempo y es la base de muchas técnicas criptográficas posteriores. Incluso se sigue enseñando en cursos introductorios de criptografía por su <strong>valor histórico</strong>.
		</p>
	</div>

	<!-- SCRIPTS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
	<script>
function descargarPDF() {
	const original = document.getElementById("contenido-pdf");
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
		filename: 'dato1_completo.pdf',
		image: { type: 'jpeg', quality: 0.98 },
		html2canvas: { scale: 2 },
		jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
	}).from(clon).save();
}
</script>


</body>
</html>

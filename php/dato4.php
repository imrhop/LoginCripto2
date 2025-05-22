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
			<a href="#" onclick="descargarPDF()">Descargar PDF</a>
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
	<div id="contenido-pdf4">
	<h1>DATO 4</h1>
	<h2>Wei Dai y el proto-Bitcoin</h2>

	<h3>¿Quién es Wei Dai?</h3>
	<p>
		Wei Dai es un <strong>criptógrafo e ingeniero</strong> que en 1998 propuso un sistema de dinero digital descentralizado y anónimo llamado <strong>b-money</strong>.
	</p>


	<h4>Características adelantadas a su época:</h4>
	<ul>
		<li>Sistema sin una autoridad central.</li>
		<li>Prueba de trabajo (<em>Proof-of-Work</em>).</li>
		<li>Uso de identidades digitales verificables.</li>
		<li>Libro contable compartido entre participantes.</li>
	</ul>

	<h3>¿Qué pasó con b-money?</h3>
	<p>
		Nunca se implementó como software funcional, pero el <strong>whitepaper de Bitcoin</strong> cita explícitamente a b-money, lo que muestra que <strong>Satoshi Nakamoto</strong> se basó en su propuesta.
	</p>

	<div>
			<img src="../img/bmoneyjpg.jpg" alt=" B-Money" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 20px auto;">
		</div>

	<h4>Dato curioso:</h4>
	<p>
		Wei Dai y <strong>Nick Szabo</strong> (creador de otra moneda virtual, <em>Bit Gold</em>) son considerados por algunos como posibles candidatos a ser Satoshi Nakamoto, aunque ambos lo han negado.
	</p>
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function descargarPDF() {
	const original = document.getElementById("contenido-pdf4");
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
		filename: 'dato4_completo.pdf',
		image: { type: 'jpeg', quality: 0.98 },
		html2canvas: { scale: 2 },
		jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
	}).from(clon).save();
}
</script>


</body>
</html>
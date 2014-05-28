<?php 
	require("includes/conexion.php");
	include("includes/query.php");
	$sql = $datosEstudiante." WHERE tiposidentificaciones.num_doc = '101010'";
	$result = pg_query($sql);
	$datos = pg_fetch_array($result);
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/cesmag/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/menuDesplegable.css">
	<link rel="stylesheet" type="text/css" href="css/estudiosBasicos.css">
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jquery.ui.datepicker-es.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="scripts/index.js"></script>
	<script type="text/javascript">
		json = JSON.parse('<?php echo json_encode($datos) ?>');
		$(document).ready(inicio);
	</script>
</head>
<body>
	<nav>
		<ul class="menu">
			<li>
				<a href="">Datos Personales</a>
			</li>
			<li>
				<a href="">Estudios</a>
				<ul>
					<li><a href="">Educacion Básica</a></li>
					<li><a href="">Educacion Superior</a></li>
					<li><a href="">Otros Estudios</a></li>
				</ul>
			</li>
			<li>
				<a href="">Informacion Laboral</a>
			</li>
		</ul>
	</nav>
	<div id="container">
		<form id="datosPersonales" action="">
			<div class="bloque" id="bloque">
				<label for="sPais">Pais</label>
				<select name="" id="sPais"></select>
				<label for="sDep">Departamento</label>
				<select name="" id="sDep"></select>
				<label for="sBachillerato">Bachillerato</label>
				<select name="" id="sBachillerato"></select>
				<label for="sYear">Año</label>
				<select name="" id="sYear"></select>
				<input type="submit" value="Guardar">
			</div>
		</form>
	</div>
</body>
</html>

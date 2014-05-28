<?php 
	require("includes/conexion.php");
	include("includes/query.php");
	$sql = $datosEstudiante." WHERE tiposidentificaciones.num_doc = '101010'";
	$result = pg_query($sql);
	$datos = pg_fetch_array($result);
	
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/cesmag/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/menuDesplegable.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jquery.ui.datepicker-es.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="scripts/otrosEstudios.js"></script>
	<script type="text/javascript">
		json = JSON.parse('<?php echo json_encode($datos) ?>');
		$(document).ready(inicio2);
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
					<li><a id="eBasica">Educacion Básica</a></li>
					<li><a id="eSuperior">Educacion Superior</a></li>
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
			<div class="bloque">
				<label for="sPais">Pais</label>
				<select id="sPais"><option value="">COLOMBIA</option></select>
				<label for="sDep">Departamento</label>
				<select id="sDep"><option value="">NARIÑO</option></select>
				<label for="sMun">Municipio</label>
				<select id="sMun"><option value="">PASTO</option></select>
				<label for="sInstituto">Institución</label>
				<select id="sInstituto"><option value="">CENTRO DE ESTUDIOS SUPERIORES MARÍA GORETTI</option></select>
				<label for="fEgreso">Fecha egreso</label>
				<input type="text" id="fEgreso" value="2009-12-13" required>
				<label for="titulo">Titulo Otorgado</label>
				<select id="titulo"><option value="">ABOGADO</option></select>
				<div id="actual">
					<div style="display:block;width:100%">Estudia Actualmente</div>
					<label for="rSi">Si</label> <input type="radio" name="estudia" id="rSi"value="si">
					<label for="rNo">No</label> <input type="radio" name="estudia" id="rNo"value="no" checked>
				</div>
			</div>
			<div id="estudiando" class="bloque">
				<label for="sPais2">Pais</label>
				<select id="sPais2"><option value="">COLOMBIA</option></select>
				<label for="sDep2">Departamento</label>
				<select id="sDep2"><option value="">NARIÑO</option></select>
				<label for="sMun2">Municipio</label>
				<select id="sMun2"><option value="">PASTO</option></select>
				<label for="sInstituto2">Institución</label>
				<select id="sInstituto2"><option value="">CENTRO DE ESTUDIOS SUPERIORES MARÍA GORETTI</option></select>
				<label for="fIngreso">Fecha ingreso</label>
				<input type="text" id="fIngreso" value="2012-08-2" required>
				<label for="sSemestre">Semestre</label>
				<select id="sSemestre"><option value="">1</option></select>
			</div>
			<input type="submit" value="Guardar">
		</form>
	</div>
	<div id="_eBasica">
		<form id="datosPersonales" action="">
			<label for="sPais">Pais</label>
			<select id="sPais"></select>
			<label for="sDep">Departamento</label>
			<select id="sDep"></select>
			<label for="sBachillerato">Bachillerato</label>
			<select id="sBachillerato"></select>
			<label for="sYear">Año</label>
			<select id="sYear"></select>
			<input type="submit" value="Guardar">
		</form>
	</div>
	<div id="_eSuperior">
		<form action="">
			<label for="stitulo">Titulo Otorgado</label>
			<select id="sTitulo"></select>
			<label for="fEgreso">Fecha Egreso</label>
			<input type="text" id="fEgreso">
		</form>
	</div>
</body>
</html>

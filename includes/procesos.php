<?php
	require("conexion.php");
	require("query.php");

	$op = $_REQUEST["op"];
	switch($op){
		case "updateIdiomas":
			$user = $_REQUEST['id'];
			$add = $_REQUEST['add'];
			$idioma = $_REQUEST['idioma'];
			if($add == "true"){
				$sql = "INSERT INTO persidioms (id_persona,id_idioma) VALUES ($user,$idioma)";
				$result = pg_query($sql);
			}else{
				$sql = "DELETE FROM persidioms WHERE id_persona = $user AND id_idioma = $idioma";
				$result = pg_query($sql);
			}
			break;
		case "idiomas":
			$user = $_REQUEST['id'];
			$json;
			$sql = "SELECT persidioms.id_idioma as idioma FROM personas INNER JOIN persidioms ON persidioms.id_persona = personas.id WHERE personas.id = $user";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$json[$i] = $data['idioma'];
				$i++;
			}
			echo json_encode($json);
			break;
		case "cerrarSesion":
			session_start();
			session_destroy();
			break;
		case "loginEgresado": 
			$user = $_REQUEST['id'];
			$pass = md5($_REQUEST['pass']);
			$sql = "SELECT id_persona, num_doc, contraseña, pri_nom FROM tiposidentificaciones LEFT JOIN personas
			ON personas.id = tiposidentificaciones.id_persona WHERE num_doc = '$user' AND contraseña = '$pass'";
			$result = pg_query($sql);
			$data = pg_fetch_array($result);
			$result2 = pg_num_rows($result);
			if($result2 == 1){
				session_start();
				$_SESSION['egresado'] = $data['num_doc'];
				if($data['pri_nom'] == $data['contraseña'])
					$_SESSION['cPass'] = "true";
				else
					$_SESSION['cPass'] = "false";
				echo "true";
			}else
				echo "false";
			break;
		case "cambiarPass":
			session_start();
			$user = $_SESSION['egresado'];
			$passA = md5($_REQUEST['passA']);
			$passN = md5($_REQUEST['passN']);
			$consulta = "SELECT * FROM tiposidentificaciones WHERE  contraseña = '$passA' AND num_doc = '$user'";
			$result = pg_query($consulta);
			$num = pg_num_rows($result);
			$result = pg_fetch_array($result);
			if($num == 1){
				$consulta = "UPDATE tiposidentificaciones set contraseña = '$passN' WHERE contraseña = '$passA' AND num_doc = '$user'";
				$result = pg_query($consulta);
				$_SESSION['cPass'] = "false";
				echo "true";
			}else
				echo "false";
			break;
		case "selectAdmin":
			$respuesta;
			$sql = "SELECT nombre FROM programas";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$respuesta['programas'][$i] = $data['nombre'];
				$i++;
			}
			$sql = "SELECT nombre FROM titulos";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$respuesta['titulos'][$i] = $data['nombre'];
				$i++;
			}
			$sql = "SELECT descripcion FROM idiomas";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$respuesta['idiomas'][$i] = $data['descripcion'];
				$i++;
			}
			echo json_encode($respuesta);
			break;
		case "saveIL":
			$fechaI = $_REQUEST['fechaI'];
			$fechaE = $_REQUEST['fechaE'];
			$empresa = $_REQUEST['empresa'];
			$cargo = $_REQUEST['cargo'];
			$id = $_REQUEST['id'];
			/* INSERT INTO cargossedes (id_cargo,id_sede) VALUES (123, l234) */
			$sql = "INSERT INTO cargossedes (id_cargo,id_sede) VALUES ((SELECT id FROM cargos WHERE descripcion = '$cargo'),
				(SELECT id FROM sedesemps WHERE nombre = '$empresa'))";
			$result = pg_query($sql);
			$sql = "SELECT id FROM cargossedes ORDER BY id DESC";
			$result = pg_query($sql);
			$tmp = pg_fetch_row($result);
			$tmp = $tmp['0'];
			$sql = "INSERT INTO experslabs (id_persona,fecha_ing,fecha_egr,id_cargosede)
				VALUES ($id,'$fechaI','$fechaE',$tmp) ";
			echo pg_query($sql);
			break;
		case "soloNombre":
			$json;
			$cW = (isset($_REQUEST['cW']))?$_REQUEST['cW']:"1";
			$idW = (isset($_REQUEST['idW']))?$_REQUEST['idW']:"1";

			$tabla = $_REQUEST['tabla'];
			$sql = "SELECT * FROM $tabla WHERE $cW = $idW";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$json[$i] = $data[1];
				$i++;
			}
			echo json_encode($json);
			break;
		case "saveOE":
			$fechaI = $_REQUEST['fechaI'];
			$fechaE = $_REQUEST['fechaE'];
			$ins = $_REQUEST['ins'];
			$titulo = $_REQUEST['titulo'];
			$id = $_REQUEST['id'];
			$sql = "INSERT INTO estudiospers (id_persona,fecha_ing,fecha_egre,id_sede) VALUES ($id,'$fechaI','$fechaE',$ins)";
			$result = pg_query($sql);
			$sql = "SELECT estudiospers.id FROM personas LEFT JOIN estudiospers ON estudiospers.id_persona = personas.id WHERE personas.id = $id";
			$result = pg_query($sql);
			$id = pg_fetch_row($result);
			$id = $id['0'];
			$sql = "INSERT INTO otrosTitulos (id_estudio,nombre) VALUES ($id,'$titulo')";
			pg_query($sql);
			echo $id;
			break;
		case "saveEB":
			$fecha = $_REQUEST['fecha'];
			$sede = $_REQUEST['sede'];
			$id = $_REQUEST['id'];
			$update = $_REQUEST['update'];
			if($update == "true"){	//-------------   Actualizar informacion
				$idSede = $_REQUEST['idSede'];
				$sql = "UPDATE estudiospers SET fecha_egre = '$fecha', id_sede = $sede WHERE id = $idSede";
			}else 	//------------------   Insertar educacion basica por primera vez
				$sql = "INSERT INTO estudiospers (id_persona,fecha_egre,id_sede) VALUES ($id,'$fecha',$sede)";
			$result = pg_query($sql);
			echo $result;
			break;
		case "saveES":
			$fecha = $_REQUEST['fecha'];
			$titulo = $_REQUEST['titulo'];
			$id = $_REQUEST['id'];
			$sql = "UPDATE estudiospers SET fecha_egre = '".$fecha."', id_titulo=".$titulo." WHERE id_persona=".$id;
			pg_query($sql);
			break;
		case "eBasica":
			$sql = $eBasica.$_REQUEST['idPer'];
			$result = pg_query($sql);
			echo json_encode(pg_fetch_array($result));
			break;
		case "eSuperior":
			$sql = $eSuperior.$_REQUEST['idPer'];
			$result = pg_query($sql);
			echo json_encode(pg_fetch_array($result));
			break;
		case "saveDP":
			$data = $_REQUEST['data'];
			$data = json_decode($data);
			$sql = updatePersonas($data);
			pg_query($sql);
			$sql = "UPDATE tiposidentificaciones SET num_doc='$data[6]', tipo_doc='$data[5]' WHERE id_persona='$data[0]'";
			pg_query($sql);
			$sql = "UPDATE ubicapersonas SET descripcion = '$data[13]' WHERE id_ubicacion = 1 and id_persona='$data[0]'";
			pg_query($sql);
			$sql = "UPDATE ubicapersonas SET descripcion = '$data[14]' WHERE id_ubicacion = 2 and id_persona='$data[0]'";
			pg_query($sql);
			$sql = "UPDATE ubicapersonas SET descripcion = '$data[15]' WHERE id_ubicacion = 3 and id_persona='$data[0]'";
			pg_query($sql);
			$sql = "UPDATE ubicapersonas SET descripcion = '$data[16]' WHERE id_ubicacion = 4 and id_persona='$data[0]'";
			pg_query($sql);
			echo $sql;
			break;
		case "json":
			$json;
			$tabla = $_REQUEST['tabla'];
			$ins = (isset($_REQUEST['ins']))?$_REQUEST['ins']:"0";
			$cW = (isset($_REQUEST['cW']))?$_REQUEST['cW']:"1";
			$idW = (isset($_REQUEST['idW']))?$_REQUEST['idW']:"1";
			if($ins == "1"){
				$sql = "SELECT * FROM $tabla WHERE $cW = $idW AND id_institucion != 0";
			}else if($ins == "2"){
				$sql = "SELECT * FROM $tabla WHERE $cW = $idW AND id_institucion = 0";
			}else{
				$sql = "SELECT * FROM $tabla WHERE $cW = $idW";
			}

			$tabla = $_REQUEST['tabla'];
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$json['tabla'][$i]['id'] = $data['id'];
				$json['tabla'][$i]['nombre'] = $data['nombre'];
				$i++;
			}
			
			$json['ciudad_carga']["d"] = date("d");
			$json['ciudad_carga']["m"] = date("n");
			echo json_encode($json);
			break;
		case 'listar': // por nombre
			$tabla = $_REQUEST['tabla'];
			$cW = (isset($_REQUEST['cW']))?$_REQUEST['cW']:"1";
			$idW = (isset($_REQUEST['idW']))?$_REQUEST['idW']:"1";
			$sql = "SELECT nombre FROM $tabla WHERE $cW = '$idW'";
			$result = pg_query($sql);
			$lista = "<ul id='lf'>";
			$i = 0;
			while($data = pg_fetch_array($result)){
				$lista .= "<li>".$data["nombre"]."</li>";
				$i++;
			}
			$lista .= "</ul>";
			echo $lista;
			break;
		case "updatePai":
			$str = $_REQUEST["str"];
			$sql = "INSERT INTO paises (nombre) VALUES ('$str')";
			pg_query($sql);
			break;
		case "updateDep":
			$pais = $_REQUEST["pais"];
			$str = $_REQUEST["str"];
			$sql = "INSERT INTO departamentos (nombre,id_pais) VALUES ('$str',$pais)";
			pg_query($sql);
			break;
		case "updateMun":
			$mun = $_REQUEST["mun"];
			$str = $_REQUEST["str"];
			$sql = "INSERT INTO ciudades (nombre,id_dpto) VALUES ('$str',$mun)";
			pg_query($sql);
			break;
		case "jsonPro":
			$json;
			$sql = "SELECT * FROM programas";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$json['programas'][$i]['id'] = $data['id'];
				$json['programas'][$i]['nombre'] = $data['nombre'];
				$i++;
			}
			echo json_encode($json);
			break;
		case "paraPro":
			$json;
			$sql = "SELECT * FROM facultades";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$json['facultades'][$i]['id'] = $data['id'];
				$json['facultades'][$i]['nombre'] = $data['nombre'];
				$i++;
			}

			$sql = "SELECT * FROM tiposestudios";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$json['tipoEs'][$i]['id'] = $data['id'];
				$json['tipoEs'][$i]['desc'] = $data['descripcion'];
				$i++;
			}
			$sql = "SELECT * FROM modalidad";
			$result = pg_query($sql);
			$i = 0;
			while($data = pg_fetch_array($result)){
				$json['modalidad'][$i]['id'] = $data['id'];
				$json['modalidad'][$i]['desc'] = $data['descripcion'];
				$i++;
			}
			echo json_encode($json);
			break;
		case "listarPro":
			$sql = "SELECT nombre FROM programas";
			$result = pg_query($sql);
			$lista = "<ul id='lf'>";
			$i = 0;
			while($data = pg_fetch_array($result)){
				$lista .= "<li name='$i'>".$data["nombre"]."</li>";
				$i++;
			}
			$lista .= "</ul>";
			echo $lista;
			break;
		case "updatePro":
			$programa = $_REQUEST["programa"];
			$tipoEs = $_REQUEST['tipoEs'];
			$idFac = $_REQUEST['idFac'];
			$idMod = $_REQUEST['idMod'];
			$sql = "INSERT INTO programas (id_facultad,id_tipoestudio,id_modalidad,nombre) VALUES ($idFac,$tipoEs,$idMod,'$programa')";
			pg_query($sql);
			break;
		case "updateTit":
			$titulo = $_REQUEST["titulo"];
			$idPro = $_REQUEST['idPro'];
			$sql = "INSERT INTO titulos (id_programa,nombre) VALUES ($idPro,'$titulo')";
			pg_query($sql);
			break;
		case "listarTit":
			$sql = "SELECT nombre FROM titulos";
			$result = pg_query($sql);
			$lista = "<ul id='lf'>";
			$i = 0;
			while($data = pg_fetch_array($result)){
				$lista .= "<li>".$data["nombre"]."</li>";
				$i++;
			}
			$lista .= "</ul>";
			echo $lista;
			break;
		case "listarFac":
			$sql = "SELECT nombre FROM facultades";
			$result = pg_query($sql);
			$lista = "<ul id='lf'>";
			$i = 0;
			while($data = pg_fetch_array($result)){
				$lista .= "<li name='$i'>".$data["nombre"]."</li>";
				$i++;
			}
			$lista .= "</ul>";
			echo $lista;
			break;
		case "updateFac":
			$fac = $_REQUEST["fac"];
			$sql = "insert into facultades (nombre) values ('$fac')";
			echo pg_query($sql);
			break;

		case "noDuplicados":
			$cW = (isset($_REQUEST['cW']))?$_REQUEST['cW']:"1";
			$idW = (isset($_REQUEST['idW']))?$_REQUEST['idW']:"1";

			$tabla = $_REQUEST["tabla"];
			$str = $_REQUEST["str"];
			$sql = "SELECT nombre FROM $tabla WHERE $cW = '$idW'";
			$result = pg_query($sql);
			$clase = "bien";
			while ($data = pg_fetch_array($result)) {
				if(strcasecmp($str, $data["nombre"]) == 0){
					$clase = "mal";
				}
			}
			echo $clase;
			break;
	}
?>

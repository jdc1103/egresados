<?php
	(isset ($_REQUEST['oper']))?$oper = $_REQUEST['oper']:$oper=false;
	
	// connect to the database
	require("conexion.php");

	switch($oper){
		case 'del':
			$_id = $_REQUEST["id"];
			$SQL = "SELECT user FROM usuario WHERE id = $_id";
			$row = pg_query($SQL);
			$row = pg_fetch_array($row);
			$_u = $row['user'];
			$SQL = "DELETE from usuario where id='$_id'";
			pg_query( $SQL );
			$SQL = "DELETE from proyecto where user='$_u'";
			pg_query( $SQL );
			break;
		case 'permisos':
			$_id = $_REQUEST["id"];
			$nPer = $_REQUEST["nPer"];
			$SQL = "UPDATE usuario SET type = '$nPer' WHERE id='$_id'";
			pg_query( $SQL );
			echo "true";
			break;
		default:
			$page = $_REQUEST['page']; // get the requested page
			$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
			$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
			$sord = $_REQUEST['sord']; // get the direction
			
			if(!$sidx) $sidx =1;
			
			$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows']: false;
			if($totalrows) {
				$limit = $totalrows;
			}
			
			//populateDBRandom();
			$result = pg_query("SELECT DISTINCT count (personas.id) FROM personas");
			$row = pg_fetch_array($result);
			$count = $row['count'];
			
			if( $count >0 ) {
				$total_pages = ceil($count/$limit);
			} else {
				$total_pages = 0;
			}
			
			if ($page > $total_pages) $page=$total_pages;
			if ($limit<0) $limit = 0;
			$start = $limit*$page - $limit; // do not put $limit*($page - 1)
			if ($start<0) $start = 0;
			

			$SQL = 'SELECT DISTINCT
personas.id,
tiposidentificaciones.num_doc,
ciu.nombre as nom_ciu,
personas.pri_nom,
personas.seg_nom,
personas.pri_ape,
personas.seg_ape,
personas.genero,
estudiospers.fecha_egre,
titulos.nombre,
programas.nombre,
facultades.nombre,
personas.fechanacimiento,
(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=1)
as direccion,
(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=2)
as telefono,
(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=3)
as celular,
(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=4)
as correo,
estadosciviles.descripcion
FROM
personas
INNER JOIN estadosciviles ON personas.id_estadocivil = estadosciviles.id
INNER JOIN estudiospers ON estudiospers.id_persona = personas.id
INNER JOIN titulos ON estudiospers.id_titulo = titulos.id
INNER JOIN programas ON titulos.id_programa = programas.id
INNER JOIN facultades ON programas.id_facultad = facultades.id
INNER JOIN tiposidentificaciones ON tiposidentificaciones.id_persona = personas.id
INNER JOIN tipo_doc ON tiposidentificaciones.tipo_doc = tipo_doc.id
LEFT JOIN ciudades as ciu ON personas.id_residencia = ciu.id AND tiposidentificaciones.id_ciudexp = ciu.id
INNER JOIN ubicapersonas ON ubicapersonas.id_persona = personas.id
INNER JOIN ubicaciones ON ubicapersonas.id_ubicacion = ubicaciones.id ';
//ORDER BY $sidx $sord LIMIT $start , $limit
			$result = pg_query( $SQL ) ;
			$responce =new stdClass();
			$responce->page = $page;
			//echo ($page."____". $total_pages);
			$responce->total = $total_pages;
			$responce->records = $count;
			$i=0;
			while($row = pg_fetch_array($result)) {
				$responce->rows[$i]['id']=$row["id"];
				$responce->rows[$i]['cell']=array($row["id"],$row["num_doc"],$row["nom_ciu"],$row["pri_nom"],$row["seg_nom"],$row["pri_ape"],$row["seg_ape"],$row["genero"],$row["fecha_egre"],$row["pri_nom"],$row["nombre"],$row["nombre"],$row["nombre"],$row["fechanacimiento"],$row["direccion"],$row["telefono"],$row["celular"],$row["correo"],$row["descripcion"],"");				
				$i++;
			} 
			//variables();
			echo json_encode($responce);
			//pg_close($db);
			break;
	}
	
	function variables(){
		$variables = "\n \n_____________________________\n\n";
		$numero = count($_REQUEST);
		$tags = array_keys($_REQUEST);// obtiene los nombres de las varibles
		$valores = array_values($_REQUEST);// obtiene los valores de las varibles
		
		// crea las variables y les asigna el valor
		for($i=0; $i<$numero; $i++){
			$variables .= $tags[$i]." = ".$valores[$i]."\n";
		}
		$archivo = fopen("archivo.txt","a");
		fwrite($archivo,$variables);
		fclose($archivo);
	}
?>
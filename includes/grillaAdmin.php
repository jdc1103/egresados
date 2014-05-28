<?php
	(isset ($_REQUEST['oper']))?$oper = $_REQUEST['oper']:$oper=false;
	// connect to the database
	require("conexion.php");
	switch($oper){
		case 'edit':
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
			$result = pg_query("SELECT count(*) FROM personas LEFT JOIN tiposidentificaciones ON tiposidentificaciones.id_persona = personas.id
				LEFT JOIN estudiospers ON estudiospers.id_persona = personas.id LEFT JOIN sedes ON estudiospers.id_sede = sedes.id
				LEFT JOIN titulos ON estudiospers.id_titulo = titulos.id LEFT JOIN programas ON titulos.id_programa = programas.id
				LEFT JOIN persidioms ON persidioms.id_persona = personas.id LEFT JOIN idiomas ON persidioms.id_idioma = idiomas.id
				LEFT JOIN experslabs ON experslabs.id_persona = personas.id LEFT JOIN otrostitulos ON otrostitulos.id_estudio = estudiospers.id");
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
			

			$SQL = "SELECT personas.pri_nom, personas.seg_nom, personas.pri_ape, personas.seg_ape, personas.genero, tiposidentificaciones.num_doc,
				sedes.nombre as sede, programas.nombre as programa, titulos.nombre as titulo, otrostitulos.nombre as otro_titulo, idiomas.descripcion as idioma, experiencia.meses as experiencia,
				c.descripcion as correo FROM personas LEFT JOIN tiposidentificaciones ON tiposidentificaciones.id_persona = personas.id
				LEFT JOIN estudiospers ON estudiospers.id_persona = personas.id LEFT JOIN sedes ON estudiospers.id_sede = sedes.id
				LEFT JOIN titulos ON estudiospers.id_titulo = titulos.id LEFT JOIN programas ON titulos.id_programa = programas.id
				LEFT JOIN persidioms ON persidioms.id_persona = personas.id LEFT JOIN idiomas ON persidioms.id_idioma = idiomas.id

				LEFT JOIN (SELECT SUM((DATE_PART('year', experslabs.fecha_egr::date) - DATE_PART('year', experslabs.fecha_ing::date)) * 12 +
         		(DATE_PART('month', experslabs.fecha_egr::date) - DATE_PART('month', experslabs.fecha_ing::date))) as meses, experslabs.id_persona
				FROM personas LEFT JOIN experslabs ON experslabs.id_persona = personas.id GROUP BY id_persona) as experiencia
				ON experiencia.id_persona = personas.id
				LEFT JOIN otrostitulos ON otrostitulos.id_estudio = estudiospers.id
				LEFT JOIN (select id_persona, descripcion FROM ubicapersonas AS ub WHERE id_ubicacion = 4) as c ON personas.id = c.id_persona";
			
//ORDER BY $sidx $sord LIMIT $start , $limit
			$result = pg_query( $SQL ) ;
			$responce = new stdClass();
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			$i=0;
			while($row = pg_fetch_array($result)) {
				$responce->rows[$i]['id']=$i;
				$responce->rows[$i]['cell']=array($row["pri_nom"],$row["seg_nom"],$row["pri_ape"],$row["seg_ape"],$row["num_doc"],$row["genero"],$row["sede"],$row["programa"],$row["titulo"],$row["otro_titulo"],$row["idioma"],$row["experiencia"],$row["correo"]);
				$i++;
			} 

			echo json_encode($responce);
			//pg_close($db);
			break;
	}
?>
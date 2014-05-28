<?php
	$id = $_REQUEST['idw'];
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
			$result = pg_query("SELECT count(*) FROM personas INNER JOIN experslabs ON experslabs.id_persona = personas.id
				INNER JOIN cargossedes ON experslabs.id_cargosede = cargossedes.id
				INNER JOIN cargos ON cargossedes.id_cargo = cargos.id
				INNER JOIN sedesemps ON cargossedes.id_sede = sedesemps.id
				INNER JOIN ciudades ON sedesemps.id_lugar = ciudades.id
				WHERE personas.id = $id");
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
			

			$SQL = "SELECT sedesemps.nombre as empresa, experslabs.fecha_ing, experslabs.fecha_egr as fecha_egre,
				cargos.descripcion as cargo, ciudades.nombre ciudad
				FROM personas INNER JOIN experslabs ON experslabs.id_persona = personas.id
				INNER JOIN cargossedes ON experslabs.id_cargosede = cargossedes.id
				INNER JOIN cargos ON cargossedes.id_cargo = cargos.id
				INNER JOIN sedesemps ON cargossedes.id_sede = sedesemps.id
				INNER JOIN ciudades ON sedesemps.id_lugar = ciudades.id
				WHERE personas.id = '$id'";
			
//ORDER BY $sidx $sord LIMIT $start , $limit
			$result = pg_query( $SQL ) ;
			$responce =new stdClass();
			$responce->page = $page;
			//echo ($page."____". $total_pages);
			$responce->total = $total_pages;
			$responce->records = $count;
			$i=0;
			while($row = pg_fetch_array($result)) {
				$responce->rows[$i]['id']=$i;
				$responce->rows[$i]['cell']=array($row["empresa"],$row["fecha_ing"],$row["fecha_egre"],$row["cargo"],$row["ciudad"]);
				$i++;
			} 
			echo json_encode($responce);
			//pg_close($db);
			break;
	}
?>
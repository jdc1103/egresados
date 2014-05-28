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
			$result = pg_query("SELECT count(*) FROM personas INNER JOIN estudiospers ON estudiospers.id_persona = personas.id WHERE personas.id = $id");
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
			

			$SQL = "SELECT 	sedes.nombre as sede, otrostitulos.nombre as titulo, estudiospers.fecha_ing, estudiospers.fecha_egre FROM personas
				LEFT JOIN estudiospers ON estudiospers.id_persona = personas.id
				INNER JOIN otrostitulos ON estudiospers.id = otrostitulos.id_estudio
				LEFT JOIN sedes ON sedes.id = estudiospers.id_sede
				WHERE personas.id = $id";
			
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
				$responce->rows[$i]['cell']=array($row["sede"],$row["titulo"],$row["fecha_ing"],$row["fecha_egre"]);				
				$i++;
			} 
			echo json_encode($responce);
			//pg_close($db);
			break;
	}
?>
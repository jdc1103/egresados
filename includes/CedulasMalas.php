<?php
	// connect to the database
	require("conexion.php");

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
	$result = pg_query("SELECT count(*) FROM personas INNER JOIN tiposidentificaciones ON tiposidentificaciones.id_persona = personas.id");
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
	

	$SQL = 'SELECT personas.pri_nom, personas.seg_nom, personas.pri_ape, personas.seg_ape, tiposidentificaciones.num_doc
		FROM personas INNER JOIN tiposidentificaciones ON tiposidentificaciones.id_persona = personas.id';
//ORDER BY $sidx $sord LIMIT $start , $limit
	$result = pg_query( $SQL ) ;
	$responce =new stdClass();
	$responce->page = $page;
	//echo ($page."____". $total_pages);
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = pg_fetch_array($result)) {
		if(!is_numeric($row["num_doc"])){
			$responce->rows[$i]['id'] = $i;
			$nombre = $row["pri_nom"].' '.$row["seg_nom"].' '.$row["pri_ape"].' '.$row["seg_ape"];
			$responce->rows[$i]['cell'] = array($nombre,$row["num_doc"]);
			$i++;
		}
	} 
	//variables();
	echo json_encode($responce);
	//pg_close($db);
?>
<?php
	require "conexion.php";
	//if(isset($_POST['tag'])){
		try{
			$sql ="select * from total";
			
				//ejecutar sentencia sql con pg_query
			$result = pg_query($sql) or die ("Error query".pg_last_error());
			if(pg_num_rows($result)>0){
				$json = array();
				while($row = pg_fetch_array($result)){
					$json[] = array(
						'id' => $row['id'],
						'num_doc' => $row['num_doc'],
						'ciudexp' => $row['ciudexp'],
						'pri_ape' => $row['pri_ape'],
						'seg_ape' => $row['seg_ape'],
						'pri_nom' => $row['pri_nom'],
						'seg_nom' => $row['seg_nom'],
						'genero' => $row['genero'],
						'fecha_egre' => $row['fecha_egre'],
						'programa' => $row['programa'],
						'facultad' => $row['facultad'],
						'titulo' => $row['titulo'],
						'direccion' => $row['direccion'],
						'telefono' => $row['telefono'],
						'calular' => $row['celular'],
						'correo' => $row['correo'],
						'descripcion' => $row['descripcion']
					);
				}
				$json['success'] = true;
				echo json_encode($json);
			}
		}catch(PDOexception $e){
			echo "error";
		}
	//}
	
?>
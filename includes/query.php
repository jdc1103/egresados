<?php 
	$eSuperior = "SELECT estudiospers.fecha_egre, titulos.id, titulos.nombre
		FROM personas
		INNER JOIN estudiospers ON estudiospers.id_persona = personas.id
		INNER JOIN titulos ON estudiospers.id_titulo = titulos.id
		WHERE personas.id=";
	$eBasica = "SELECT estudiospers.id, estudiospers.fecha_egre  as fecha, sedes.id as sede, ciudades.id as ciudad,
		departamentos.id as departamento, paises.id as pais
		FROM personas
		LEFT JOIN estudiospers ON estudiospers.id_persona = personas.id
		LEFT JOIN sedes ON estudiospers.id_sede = sedes.id
		LEFT JOIN instituciones ON sedes.id_institucion = instituciones.id
		LEFT JOIN ciudades ON sedes.id_ciudad = ciudades.id 
		LEFT JOIN departamentos ON ciudades.id_dpto = departamentos.id
		LEFT JOIN paises ON departamentos.id_pais = paises.id
		WHERE instituciones.id = 0 AND personas.id=";
	$datosEstudiante ="SELECT DISTINCT
		personas.id,
		tiposidentificaciones.tipo_doc,
		tiposidentificaciones.num_doc,
		ciu.nombre as nom_ciu,
		personas.pri_nom,
		personas.seg_nom,
		personas.pri_ape,
		personas.seg_ape,
		ciudades.id as id_ciu,
		departamentos.id as id_dep,
		paises.id as id_pais,
		personas.genero,
		estudiospers.fecha_egre,
		personas.fechanacimiento,
		(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=1)
		as direccion,
		(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=2)
		as celular,
		(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=3)
		as telefono,
		(select descripcion from ubicapersonas as ub where personas.id=ub.id_persona and id_ubicacion=4)
		as correo,
		estadosciviles.descripcion as est_civ,
		estadosciviles.id as id_est_civ
		FROM
		personas
		INNER JOIN ciudades ON personas.id_residencia = ciudades.id
		INNER JOIN departamentos ON ciudades.id_dpto = departamentos.id
		INNER JOIN paises ON departamentos.id_pais = paises.id
		INNER JOIN estadosciviles ON personas.id_estadocivil = estadosciviles.id
		INNER JOIN estudiospers ON estudiospers.id_persona = personas.id
		INNER JOIN titulos ON estudiospers.id_titulo = titulos.id
		INNER JOIN programas ON titulos.id_programa = programas.id
		INNER JOIN facultades ON programas.id_facultad = facultades.id
		INNER JOIN tiposidentificaciones ON tiposidentificaciones.id_persona = personas.id
		INNER JOIN tipo_doc ON tiposidentificaciones.tipo_doc = tipo_doc.id
		LEFT JOIN ciudades as ciu ON personas.id_residencia = ciu.id AND tiposidentificaciones.id_ciudexp = ciu.id
		INNER JOIN ubicapersonas ON ubicapersonas.id_persona = personas.id
		INNER JOIN ubicaciones ON ubicapersonas.id_ubicacion = ubicaciones.id ";

	function updatePersonas($array){
		$update = "UPDATE personas set pri_ape='$array[1]', seg_ape='$array[2]', pri_nom='$array[3]', 
			seg_nom='$array[4]', fechanacimiento='$array[7]', genero='$array[8]', id_estadocivil='$array[9]', id_residencia=$array[12]
			WHERE id= $array[0]";
		return $update;
	}

?>

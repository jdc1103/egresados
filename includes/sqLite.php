<?php
	$op = $_REQUEST['op'];
	$conexion = new SQLite3('../db/Users.db');
	switch($op){
		case "loginAdm":
			$user = $_REQUEST['id'];
			$pass = $_REQUEST['pass'];
			$user = strtolower($user);
			$consulta = "SELECT *,count(admin) AS num FROM Usuarios WHERE admin = '$user' AND pass = '$pass'";
			$result = $conexion->query($consulta);
			$result = $result->fetchArray(SQLITE3_ASSOC);
			if($result['num'] == 1){
				session_start();
				$_SESSION['user'] = $result['admin'];
				echo "true";
			}else
				echo "false";
			break;
		case "close":
			session_start();
			session_destroy();
			break;
		case "cambiarPass":
			session_start();
			$user = $_SESSION['user'];
			$passA = $_REQUEST['passA'];
			$passN = $_REQUEST['passN'];
			$consulta = "SELECT *,count(admin) AS num FROM Usuarios WHERE  pass = '$passA' AND admin = '$user'";
			$result = $conexion->query($consulta);
			$result = $result->fetchArray(SQLITE3_ASSOC);
			if($result['num'] == 1){
				$consulta = "UPDATE Usuarios set pass = '$passN' WHERE pass = '$passA' AND admin = '$user'";
				$result = $conexion->query($consulta);
				echo "true";
			}else
				echo "false";
			break;
		case "updateUser":
			session_start();
			$user = $_SESSION['user'];
			$nUser = $_REQUEST['nUser'];
			$_SESSION['user'] = $nUser;
			$nUser = strtolower($nUser);
			$consulta = "UPDATE Usuarios set admin = '$nUser' WHERE admin = '$user'";
			$result = $conexion->query($consulta);
			break;
	}
?>
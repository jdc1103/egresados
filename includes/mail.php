<?php
	ini_set('max_execution_time', 300);

	$destino = $_REQUEST["correos"];
	$asunto = $_REQUEST["asunto"];
	$mensaje = $_REQUEST["contenido"];
	$archivo = $_REQUEST["archivo"];
	$listas = json_decode($destino,true);
	require_once('PHPMailer_v5.1/class.phpmailer.php');
	require_once('PHPMailer_v5.1/class.smtp.php');
	$mail = new PHPMailer();//indico a la clase que use SMTP
	$mail->IsSMTP(true);
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "apolo@iucesmag.edu.co";
	$mail->Password = "opi$123456";
	$mail->SetFrom('apolo@iucesmag.edu.co', $asunto);
	$mail->AddReplyTo("apolo@iucesmag.edu.co","SI Apolo");
	$mail->Subject = "Iucesmag";
	$mail->MsgHTML($mensaje);
	$mail->AddAttachment("../server/php/files/".$archivo);
	foreach ($listas as $key) {
		$mail->AddAddress($key,"");
	}
	$address = "jdc.1103@hotmail.co";
	$mail->AddAddress($address, "johann pantoja");
	
	//$mail->Send();
	//echo "mensaje enviado";
		if(!$mail->Send()) 
			{ echo "Erro al enviar: " . $mail->ErrorInfo;
			}
			else
			{ echo "mensaje enviado";
			}
		
	//$mail->Mailer = "smtp";//protocolo que se va a usar
	//$mail­>SMTPDebug = 2;//Debo de hacer autenticación SMTP
	//$mail­>SMTPAuth = "true";
	//$mail­>SMTPSecure = "ssl";
	//$mail­>Host = "smtp.gmail.com";//indico el servidor de Gmail para SMTP
	//$mail­>Port = 465;//indico el puerto que usa Gmail
	//$mail­>Username = "apolo@iucesmag.edu.co";//indico un usuario 
	//$mail­>Password = "opi$123456";// clave de un usuario de gmail
	//$mail­>SetFrom('apolo@iucesmag.edu.co', 'Sistema de Informacion Apolo');
	//$mail­>AddReplyTo("apolo@iucesmag.edu.co","Sistema de Informacion Apolo");
	//$mail­>Subject = "Envío de email usando SMTP de Gmail";
	//$mail­>MsgHTML("Hola que tal, esto es el cuerpo del mensaje!");
	//$address = "johannepd_06@hotmail.com";//indico destinatario
	//$mail­>AddAddress($address, "johann pantoja");
		//if(!$mail­>Send()) {
		//echo "Error al enviar: " . $mail­>ErrorInfo;
		//} else {
		//echo "Mensaje enviado!";
		//}
?>
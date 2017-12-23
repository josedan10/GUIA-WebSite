<?php 
	
	$nombre = $_POST["nombre"];
	$email = $_POST['email'];
	$subject = "Contacto con la agrupación";
	$headers[] = 'Content-type: text/html; charset=utf-8';
	$headers[] = "From: ".$email;
	$msg = "Mensaje de ".$nombre.".\n".$_POST['mensaje'];
	

	if((isset($_POST['nombre']) && !empty($_POST['nombre'])) 
		&& (isset($_POST['email']) && !empty($_POST['email']))
	&& (isset($_POST['mensaje']) && !empty($_POST['mensaje']))){

		

		mail('guia@usb.ve', $subject, $msg, implode("\r\n", $headers));
		echo 'Mensaje enviado';

	}else{

		echo 'Fallo al enviar los datos';

	}
	

 ?>
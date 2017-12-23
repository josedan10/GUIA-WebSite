<?php 
	
	$nombre = $_POST["nombre"];
	$email = $_POST['email'];
	$subject = "Suscripción a Sirius";
	$headers[] = 'Content-type: text/html; charset=utf-8';
	$headers[] = "From: guia@usb.ve";
	$msg = '
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Suscripción</title>
	</head>
	<body>
		<h1>¡Suscripción exitosa!</h1>
		<p>Gracias por suscribirte a nuestro blog. Ahora podrás estar al día con nuestras actividades y publicaciones</p>

		<!--<img src="diversionesjada.esy.es/Imagenes/guia-logo.svg" />-->
		<p><b>¡Cielos claros!</b></p>
		
	</body>
	</html>';

	if((isset($_POST['nombre']) && !empty($_POST['nombre'])) 
		&& (isset($_POST['email']) && !empty($_POST['email']))){

		

		mail($email, $subject, $msg, implode("\r\n", $headers));
		echo 'Mensaje enviado';

	}else{

		echo 'Fallo al enviar los datos';

	}
	

 ?>
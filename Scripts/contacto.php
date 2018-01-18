<?php 
	
	$nombre = $_POST["nombre"];
	$email = $_POST['email'];
	$subject = "Contacto con la agrupación";
	$headers[] = 'Content-type: text/html; charset=utf-8';
	$headers[] = "From: ".$email;
	$msg = "Mensaje de ".$nombre.".\n".$_POST['mensaje'];
	
 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>GUIA USB</title>
 	<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
 </head>
 <body>

	<?php 

		if((isset($_POST['nombre']) && !empty($_POST['nombre'])) 
			&& (isset($_POST['email']) && !empty($_POST['email']))
			&& (isset($_POST['mensaje']) && !empty($_POST['mensaje']))){

			
			mail('guia@usb.ve', $subject, $msg, implode("\r\n", $headers));
			echo '<div class="msg-grande">Mensaje enviado</div>';

		}else{

			echo '<div class="msg-grande">Fallo al enviar los datos</div>';

		}

	?>
 	
 </body>
 </html>
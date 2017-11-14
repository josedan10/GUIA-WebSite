<?php 
	
	$nombre = $_POST["nombre"];
	$email = $_POST['email'];
	$subject = "Contacto con la agrupación";
	$msg = "Hola ".$nombre." \nGracias por escribir a GUIA USB. Este es tu mensaje: ".$_POST['mensaje'];

	if((isset($_POST['nombre']) && !empty($_POST['nombre'])) 
		&& (isset($_POST['email']) && !empty($_POST['email'])) 
		&& (isset($_POST['mensaje']) && !empty($_POST['mensaje']))){

		

		mail($email, $subject, $msg);

		
		echo "$msg <br />";
		echo "$email <br />";

		echo 'Mensaje enviado';

	}else{

		echo 'Fallo al enviar los datos';

	}
	

 ?>
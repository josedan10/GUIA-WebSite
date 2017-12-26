<?php 

	function agregarSuscriptor($email, $nombre){

		//Esta función añade un nuevo suscriptor a la base de datos, o en caso de que ya exista un usuario 

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$servername = "localhost";
		$username = "root";
		$password = "Zedstaphplis07.";
		$dbname = "guiabd";

		// Creamos la conexion
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Verificamos la conexión

		if ($conn->connect_error) {
		    die("Conexión fallida: " . $conn->connect_error);
		} 

		$Query = "INSERT INTO suscripcion (Correo, Nombre) VALUES ('$email', '$nombre')";

		//Validación de la suscripción
		if($conn->query($Query)){

			echo 'Conexión exitosa';
			$respuesta = TRUE;

		}else{
			
			if("Duplicate entry $email for key 'PRIMARY'" == $conn->error){
				echo 'Este correo ya está suscrito a nuestro blog';
			}

			$respuesta = FALSE;
		}

		return $respuesta;
	};

 ?>
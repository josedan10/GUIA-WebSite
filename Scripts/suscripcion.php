<?php 

// Datos del formulario

$nombre = $_POST["nombre"];
$email = $_POST['email'];

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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

	$Query = "INSERT INTO suscripcion (Correo, Nombre) VALUES ($email, $nombre);";
	$conn->query($Query);

 ?>
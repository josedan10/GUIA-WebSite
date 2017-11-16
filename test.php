<?php 
	
	$servername = "localhost";
	$username = "root";
	$password = "Zedstaphplis07.";
	$dbname = "guiabd";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT Nombre, Inicio FROM mes";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "Nombre: " . $row["Nombre"]. " - inicio: " . $row["Inicio"]. "<br>";
	    }
	} else {
	    echo "Sin Resultados";
	}
	$conn->close();

 ?>
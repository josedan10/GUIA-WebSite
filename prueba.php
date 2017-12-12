<?php require 'Scripts/conexionDB.php'; 

	$Query = 'SELECT * FROM mes;';

	$diasInicio = array();
	$diasTotales = array();

	$resultado = $conn->query($Query);

	if ($resultado->num_rows > 0) {
	    // output data of each row
	    while($row = $resultado->fetch_assoc()) {
	        //echo "Nombre: " . $row["Nombre"]. " - Inicio: " . $row["Inicio"]. " -Dias: " . $row["Dias"]. "<br>";

	        $diasInicio[$row["Nombre"]] = $row["Inicio"];
	        $diasTotales[$row["Nombre"]] = $row["Dias"];

	    }
	} else {
	    echo "0 results";
	}

	$conn->close();

	

?>
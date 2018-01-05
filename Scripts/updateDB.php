<?php 
	
	include 'conexionDB.php';

	//El 31 de Diciembre de cada año se actualiza
	

	if($diaActual == 31 && $mesActual == 'Diciembre'){

		$Query = 'SELECT * FROM mes;';

		$diasInicio = array();
		$diasTotales = array();

		$resultado = $conn->query($Query);

		if ($resultado->num_rows > 0) {
		    // Datos de cada fila
		    while($row = $resultado->fetch_assoc()) {

		        $diasInicio[$row["Nombre"]] = $row["Inicio"];
		        $diasTotales[$row["Nombre"]] = $row["Dias"];

		    }
		} else {
		    echo "0 results";
		}

		//Hacer un ciclo forEach aquí

		for ($i = 1; $i <= 12; $i++){


			$diaInicio = $diasInicio[$row["Nombre"]];
			$diaFinal = $diasTotales[$row["Nombre"]];

			$varDia = ($varDia + $diaFinal) % 7;

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			switch($i){

				case 2:
					if($arrayFecha[0] % 4 == 0){
						$QueryUpdate = "UPDATE mes SET Inicio = $varDia, Dias = 29 WHERE Nombre = '$Meses[$i]';";

					}elseif($arrayFecha[0] % 4 == 1){
						$QueryUpdate = "UPDATE mes SET Inicio = $varDia, Dias = 28 WHERE Nombre = '$Meses[$i]';";

					}else{
						$QueryUpdate = "UPDATE mes SET Inicio = $varDia WHERE Nombre = '$Meses[$i]';";
					}

					break;

				default:
					$QueryUpdate = "UPDATE mes SET Inicio = $varDia WHERE Nombre = '$Meses[$i]';";	
					break;

			}


			if ($conn->query($QueryUpdate) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			//$conn->query($QueryUpdate);

			//if ($i == 1) $conn->query("INSERT INTO autor(Correo, Nombre_autor, Apellido_autor) VALUES ('josedanq100@gmail.com', 'José Daniel', 'Quintero');");

			$varDia = $diaInicio;

		}

		$conn->close();

	}

 ?>
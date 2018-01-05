<?php 

////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$Query = "SELECT Inicio, Dias FROM mes WHERE Nombre = '$mesActual';";

	//Consulta
	$resultado = $conn->query($Query);

	$row = $resultado->fetch_row();

	$diaInicio = $row[0];
	$diaFinal = $row[1];

	$conn->close();

	///////////////////////////////////////////////////////////////////////////////////////////////////////////

	//Creamos el Calendario

	for($i = 1, $dia = 1; $i <= 42; $i++){

		if($i < $diaInicio || $dia > $diaFinal){

			if($i % 7 == 0){

				echo '<div class="dia-inactivo dia-final"></div>';

			}else if($i % 7 == 1){

				echo '<div class="dia-inactivo dia-inicio"></div>';

			}else{

				echo '<div class="dia-inactivo"></div>';

			}
		}else{

			switch($dia){
				case $diaActual:
					if($i % 7 == 0){

						echo '<div class="dia-actual dia-final">'.$dia.'</div>';

					}else if($i % 7 == 1){

						echo '<div class="dia-actual dia-inicio">'.$dia.'</div>';

					}else{

						echo '<div class="dia-actual">'.$dia.'</div>';

					}
					$dia++;
					break;

				default:

					if($dia == 8){
						echo '<div class="dia-evento">'.$dia.'</div>';
						$dia++;
						continue;
					}
						


					if($i % 7 == 0){

						echo '<div class="dia dia-final">'.$dia.'</div>';

					}else if($i % 7 == 1){

						echo '<div class="dia dia-inicio">'.$dia.'</div>';

					}else{

						echo '<div class="dia">'.$dia.'</div>';

					}

					$dia++;
					break;

			}
					
		}


	}


?>
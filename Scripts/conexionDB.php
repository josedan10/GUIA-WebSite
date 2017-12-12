<?php

	//Conexión a BD

	$servername = "localhost";
	$username = "root";
	$password = "Zedstaphplis07.";
	$dbname = "guiabd";

	// Creamos la conexión
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Verificamos la conexión
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	$Meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
		7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');

	$diasSemana = array("Sunday" => 1, "Monday" => 2, "Tuesday" => 3, "Wednesday" => 4, 
		"Thursday" => 5, "Friday" => 6, "Saturday" => 7);

	
	$fechaCompleta = date('Y/d/m');
	$diaSemanaActual = $diasSemana[date('l')];		//Dia de la semana correspondiente al array $diasSemana

	$arrayFecha = explode("/", $fechaCompleta); 	//Array de la fecha
	$mesActual = $Meses[$arrayFecha[2]];			//Mes actual
	$diaSemana = $arrayFecha[1]; 					//Dia de la semana correspondiente a con el array $DiasMeses


	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//Supongamos que el mes actual es SEPTIEMBRE, la BD está estructurada de manera que solo necesito el día de la semana
	//en el que comienza el mes y el número de días totales para armar el mes completo

	//$mesActual = 'Julio';
	//$arrayFecha[2] = 7;

	//Para colocar el titulo con el trimestre adecuado

	if($mesActual == 'Septiembre' || $mesActual == 'Octubre' || $mesActual == 'Noviembre' || $mesActual == 'Diciembre'){
		$mes1 = 'Septiembre';
		$mes2 = 'Diciembre';
	}else{

		switch ($arrayFecha[2] % 3) {
			case 1:
				$mes1 = $mesActual;
				$mes2 = $Meses[$arrayFecha[2] + 2];
				break;
			
			case 2:
				$mes1 = $Meses[$arrayFecha[2] - 1];
				$mes2 = $Meses[$arrayFecha[2] + 1];
				break;

			default:
				$mes1 = $Meses[$arrayFecha[2] - 2];
				$mes2 = $mesActual;					
				break;
		}
		
	}


 ?>
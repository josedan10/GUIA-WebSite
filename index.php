<?php 
	
	$Meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',	7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');

	$diasSemana = array("Sunday" => 1, "Monday" => 2, "Tuesday" => 3, "Wednesday" => 4, "Thursday" => 5, "Friday" => 6, "Saturday" => 7);


	//Actualización de la BD
	$fechaCompleta = date('Y/d/m');
	$arrayFecha = explode("/", $fechaCompleta); //Arreglo de la fecha
	$mesActual = $Meses[$arrayFecha[2]];		//Mes actual en número
	$diaSemana = $arrayFecha[1];				//Dia Semana actual en número
	$varDia = $diasSemana[date('l')];			//Dia de la semana correspondiente al array $diasSemana


	//El 31 de Diciembre de cada año se actualiza

	if($diaSemana == 31 && $mesActual == 12){

		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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

		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<link rel="icon" href="favicon.png" type="image/x-icon">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">

	<!-- Iconos -->
	<link rel="stylesheet" href="CSS/style.css">


	<title>GUIA USB</title>
</head>
<body>

	
	<div class="main">

		<nav class="nav1">

			<!-- Logo de GUIA -->

			<svg id="svg4142" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 266.41 185.13"><defs><style>.cls-1{fill:#F5F5F5;}</style></defs><title>GUIALogo</title><g id="layer1"><path id="logoGuia" class="cls-1" d="M252.72,0c-16.14.28-45.17,11.1-79.63,29.44l1.38,2.07c37.78-19.94,66.34-28.9,71.72-20.85S232.4,41.69,199.55,69l7.21,10.78c41.44-34.22,65.74-64.36,58.31-75.47C263.22,1.55,259.5.15,254.24,0q-0.74,0-1.52,0h0ZM226.28,14.59c-9.67-.21-28.12,6.45-51,18.1l1.89,2.82C199.32,24.29,215,19.33,217.87,23.63s-7.69,16.9-26.52,33.12l5.2,7.76c26-22.32,40.78-40.69,36.32-47.36C231.75,15.49,229.5,14.66,226.28,14.59ZM97.73,61.31a11.73,11.73,0,0,0-6.53,2A17.16,17.16,0,0,0,86,68.86a30.09,30.09,0,0,0-3.52,8.61,44.24,44.24,0,0,0-1.21,10.7A42.12,42.12,0,0,0,82.53,99,28.77,28.77,0,0,0,86,107.28a16.6,16.6,0,0,0,5.1,5.17,11.28,11.28,0,0,0,6.05,1.84,17,17,0,0,0,6-1.15,27.94,27.94,0,0,0,6.14-3.29c0-.64-0.08-1.47-0.11-2.47s0-2.94,0-5.8V93.53a8.36,8.36,0,0,1,.28-2.29,2.94,2.94,0,0,1,1-1.54,4.09,4.09,0,0,1,1.51-.65c0.63-.17,1.12-0.28,1.49-0.35V86.09H99.07v2.62a17.81,17.81,0,0,1,2,.35,5.32,5.32,0,0,1,2.07.78,2.6,2.6,0,0,1,1.08,1.73,11.22,11.22,0,0,1,.28,2.64v6.94c0,0.88,0,1.94,0,3.2s0,2.52-.17,3.76a6.83,6.83,0,0,1-2.4,2,7.24,7.24,0,0,1-3.7,1,7.38,7.38,0,0,1-4.89-1.84,13.85,13.85,0,0,1-3.57-5,30.36,30.36,0,0,1-2.21-7.35,53.44,53.44,0,0,1-.73-9.1,58.66,58.66,0,0,1,.76-9.9,28.64,28.64,0,0,1,2.18-7.4,12.45,12.45,0,0,1,3.37-4.61,6.8,6.8,0,0,1,4.41-1.56,5.86,5.86,0,0,1,3.89,1.34,10.59,10.59,0,0,1,2.77,3.57,24.88,24.88,0,0,1,1.86,5.13c0.48,1.88.89,3.8,1.21,5.75h1.88L109,62.41h-1.86l-1,2.44a15.58,15.58,0,0,0-3.63-2.51,10.58,10.58,0,0,0-4.82-1h0Zm85.61,0.39Q181,71,178,82.89t-5.47,21.43a17,17,0,0,1-1,2.92,8,8,0,0,1-1.43,2,4.41,4.41,0,0,1-1.49.93,7.09,7.09,0,0,1-1.49.39v2.53h12.35v-2.53a8.2,8.2,0,0,1-3.29-.93,2.44,2.44,0,0,1-1.45-2.23,13.28,13.28,0,0,1,.11-1.56c0.08-.64.21-1.49,0.41-2.51s0.45-2.18.71-3.42,0.65-2.7,1.08-4.37h11.48l2.75,11.35a5.56,5.56,0,0,1,.13.82c0,0.31,0,.59,0,0.8a1.58,1.58,0,0,1-1.19,1.32,9.55,9.55,0,0,1-3,.71v2.53H201v-2.53a5.17,5.17,0,0,1-1.43-.37,4.66,4.66,0,0,1-1.41-.84,7.14,7.14,0,0,1-1.21-1.69,10.59,10.59,0,0,1-.8-2.25L185.17,61.7h-1.84Zm-67.88.71V65a7.35,7.35,0,0,1,1.49.39,4.09,4.09,0,0,1,1.47.78,3.4,3.4,0,0,1,1.06,1.58,6.58,6.58,0,0,1,.28,2.08V99.73a19.28,19.28,0,0,0,.8,5.51,14.42,14.42,0,0,0,2.33,4.63,11.34,11.34,0,0,0,3.87,3.22,11.19,11.19,0,0,0,5.28,1.21,9.85,9.85,0,0,0,3.87-.84,11.18,11.18,0,0,0,3.87-2.77,14.94,14.94,0,0,0,3-5.1,21.3,21.3,0,0,0,1.13-7.31v-22a55.4,55.4,0,0,1,.3-6.29,6.21,6.21,0,0,1,1.1-3.4,4.91,4.91,0,0,1,2-1.19,8.19,8.19,0,0,1,1.88-.41V62.41H135.81V65a9.46,9.46,0,0,1,2.12.56,5.35,5.35,0,0,1,2.23,1.38,6.81,6.81,0,0,1,1.08,3.33,45.84,45.84,0,0,1,.37,6.47V97.49a23.22,23.22,0,0,1-.39,4.26,15.48,15.48,0,0,1-1.34,4,8.64,8.64,0,0,1-2.72,3.29,7,7,0,0,1-4.26,1.25,6.61,6.61,0,0,1-4.26-1.25,8.66,8.66,0,0,1-2.44-3.2A15.27,15.27,0,0,1,125,101.7a35,35,0,0,1-.28-4.28v-28a8.86,8.86,0,0,1,.26-2.18,2.2,2.2,0,0,1,1.06-1.43,8.4,8.4,0,0,1,1.45-.52,7.82,7.82,0,0,1,1.64-.33V62.41H115.46Zm35.94,0V65a7.18,7.18,0,0,1,1.71.45,8.5,8.5,0,0,1,1.75.78,2.57,2.57,0,0,1,1.21,1.45,7,7,0,0,1,.26,2.05v36.72a5.92,5.92,0,0,1-.35,2.25,2.77,2.77,0,0,1-1.12,1.25,4.6,4.6,0,0,1-1.66.43l-1.8.22v2.53h14.79v-2.53a8.5,8.5,0,0,1-1.88-.37,9,9,0,0,1-1.58-.63,3,3,0,0,1-1.15-1.45,6.32,6.32,0,0,1-.32-2.1V69.35a7.16,7.16,0,0,1,.3-2.14,2.22,2.22,0,0,1,1.17-1.4,7.93,7.93,0,0,1,1.75-.56,9,9,0,0,1,1.71-.28V62.41H151.4Zm31.35,10.34,5,19.63h-9.86ZM60.9,104.31C18.7,138.95-6.18,169.59,1.33,180.8s45.33-.08,93.45-25.87l-7.22-10.78c-38.5,20.48-67.71,29.77-73.17,21.61s14.27-31.62,47.89-59.39l-1.38-2.07h0Zm2.15,3.22c-26.78,22.79-42.1,41.63-37.57,48.4s27.8-.2,59.09-16.25l-5.2-7.76c-22.95,11.74-39.25,17-42.19,12.62s8.15-17.45,27.76-34.18l-1.89-2.82h0Z" transform="translate(0 0)"/></g></svg>

			<!-- Menu -->

			<ul>
				<li><a href="#contacto">CONTACTO</a></li>
				<li><a href="Calendario/index.php">CALENDARIO</a></li>
				<li><a href="Sirius/index.php">SIRIUS</a></li>
				<li><a href="#miembros">MIEMBROS</a></li>
				<li><a href="#nosotros">NOSOTROS</a></li>
				<li><a href="#inicio">INICIO</a></li>
			</ul>


		</nav>
	
		<!-- Nav para móviles -->
		<nav class="nav2" id="nav-movil">

			<!-- Logo de GUIA -->

			<svg id="svg4142" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 266.41 185.13"><defs><style>.cls-1{fill:#F5F5F5;}</style></defs><title>GUIALogo</title><g id="layer1"><path id="logoGuia" class="cls-1" d="M252.72,0c-16.14.28-45.17,11.1-79.63,29.44l1.38,2.07c37.78-19.94,66.34-28.9,71.72-20.85S232.4,41.69,199.55,69l7.21,10.78c41.44-34.22,65.74-64.36,58.31-75.47C263.22,1.55,259.5.15,254.24,0q-0.74,0-1.52,0h0ZM226.28,14.59c-9.67-.21-28.12,6.45-51,18.1l1.89,2.82C199.32,24.29,215,19.33,217.87,23.63s-7.69,16.9-26.52,33.12l5.2,7.76c26-22.32,40.78-40.69,36.32-47.36C231.75,15.49,229.5,14.66,226.28,14.59ZM97.73,61.31a11.73,11.73,0,0,0-6.53,2A17.16,17.16,0,0,0,86,68.86a30.09,30.09,0,0,0-3.52,8.61,44.24,44.24,0,0,0-1.21,10.7A42.12,42.12,0,0,0,82.53,99,28.77,28.77,0,0,0,86,107.28a16.6,16.6,0,0,0,5.1,5.17,11.28,11.28,0,0,0,6.05,1.84,17,17,0,0,0,6-1.15,27.94,27.94,0,0,0,6.14-3.29c0-.64-0.08-1.47-0.11-2.47s0-2.94,0-5.8V93.53a8.36,8.36,0,0,1,.28-2.29,2.94,2.94,0,0,1,1-1.54,4.09,4.09,0,0,1,1.51-.65c0.63-.17,1.12-0.28,1.49-0.35V86.09H99.07v2.62a17.81,17.81,0,0,1,2,.35,5.32,5.32,0,0,1,2.07.78,2.6,2.6,0,0,1,1.08,1.73,11.22,11.22,0,0,1,.28,2.64v6.94c0,0.88,0,1.94,0,3.2s0,2.52-.17,3.76a6.83,6.83,0,0,1-2.4,2,7.24,7.24,0,0,1-3.7,1,7.38,7.38,0,0,1-4.89-1.84,13.85,13.85,0,0,1-3.57-5,30.36,30.36,0,0,1-2.21-7.35,53.44,53.44,0,0,1-.73-9.1,58.66,58.66,0,0,1,.76-9.9,28.64,28.64,0,0,1,2.18-7.4,12.45,12.45,0,0,1,3.37-4.61,6.8,6.8,0,0,1,4.41-1.56,5.86,5.86,0,0,1,3.89,1.34,10.59,10.59,0,0,1,2.77,3.57,24.88,24.88,0,0,1,1.86,5.13c0.48,1.88.89,3.8,1.21,5.75h1.88L109,62.41h-1.86l-1,2.44a15.58,15.58,0,0,0-3.63-2.51,10.58,10.58,0,0,0-4.82-1h0Zm85.61,0.39Q181,71,178,82.89t-5.47,21.43a17,17,0,0,1-1,2.92,8,8,0,0,1-1.43,2,4.41,4.41,0,0,1-1.49.93,7.09,7.09,0,0,1-1.49.39v2.53h12.35v-2.53a8.2,8.2,0,0,1-3.29-.93,2.44,2.44,0,0,1-1.45-2.23,13.28,13.28,0,0,1,.11-1.56c0.08-.64.21-1.49,0.41-2.51s0.45-2.18.71-3.42,0.65-2.7,1.08-4.37h11.48l2.75,11.35a5.56,5.56,0,0,1,.13.82c0,0.31,0,.59,0,0.8a1.58,1.58,0,0,1-1.19,1.32,9.55,9.55,0,0,1-3,.71v2.53H201v-2.53a5.17,5.17,0,0,1-1.43-.37,4.66,4.66,0,0,1-1.41-.84,7.14,7.14,0,0,1-1.21-1.69,10.59,10.59,0,0,1-.8-2.25L185.17,61.7h-1.84Zm-67.88.71V65a7.35,7.35,0,0,1,1.49.39,4.09,4.09,0,0,1,1.47.78,3.4,3.4,0,0,1,1.06,1.58,6.58,6.58,0,0,1,.28,2.08V99.73a19.28,19.28,0,0,0,.8,5.51,14.42,14.42,0,0,0,2.33,4.63,11.34,11.34,0,0,0,3.87,3.22,11.19,11.19,0,0,0,5.28,1.21,9.85,9.85,0,0,0,3.87-.84,11.18,11.18,0,0,0,3.87-2.77,14.94,14.94,0,0,0,3-5.1,21.3,21.3,0,0,0,1.13-7.31v-22a55.4,55.4,0,0,1,.3-6.29,6.21,6.21,0,0,1,1.1-3.4,4.91,4.91,0,0,1,2-1.19,8.19,8.19,0,0,1,1.88-.41V62.41H135.81V65a9.46,9.46,0,0,1,2.12.56,5.35,5.35,0,0,1,2.23,1.38,6.81,6.81,0,0,1,1.08,3.33,45.84,45.84,0,0,1,.37,6.47V97.49a23.22,23.22,0,0,1-.39,4.26,15.48,15.48,0,0,1-1.34,4,8.64,8.64,0,0,1-2.72,3.29,7,7,0,0,1-4.26,1.25,6.61,6.61,0,0,1-4.26-1.25,8.66,8.66,0,0,1-2.44-3.2A15.27,15.27,0,0,1,125,101.7a35,35,0,0,1-.28-4.28v-28a8.86,8.86,0,0,1,.26-2.18,2.2,2.2,0,0,1,1.06-1.43,8.4,8.4,0,0,1,1.45-.52,7.82,7.82,0,0,1,1.64-.33V62.41H115.46Zm35.94,0V65a7.18,7.18,0,0,1,1.71.45,8.5,8.5,0,0,1,1.75.78,2.57,2.57,0,0,1,1.21,1.45,7,7,0,0,1,.26,2.05v36.72a5.92,5.92,0,0,1-.35,2.25,2.77,2.77,0,0,1-1.12,1.25,4.6,4.6,0,0,1-1.66.43l-1.8.22v2.53h14.79v-2.53a8.5,8.5,0,0,1-1.88-.37,9,9,0,0,1-1.58-.63,3,3,0,0,1-1.15-1.45,6.32,6.32,0,0,1-.32-2.1V69.35a7.16,7.16,0,0,1,.3-2.14,2.22,2.22,0,0,1,1.17-1.4,7.93,7.93,0,0,1,1.75-.56,9,9,0,0,1,1.71-.28V62.41H151.4Zm31.35,10.34,5,19.63h-9.86ZM60.9,104.31C18.7,138.95-6.18,169.59,1.33,180.8s45.33-.08,93.45-25.87l-7.22-10.78c-38.5,20.48-67.71,29.77-73.17,21.61s14.27-31.62,47.89-59.39l-1.38-2.07h0Zm2.15,3.22c-26.78,22.79-42.1,41.63-37.57,48.4s27.8-.2,59.09-16.25l-5.2-7.76c-22.95,11.74-39.25,17-42.19,12.62s8.15-17.45,27.76-34.18l-1.89-2.82h0Z" transform="translate(0 0)"/></g></svg>

			<!-- Menu -->

			<span class="icon icon-menu" id="menu-icon"></span>

			<div id="menu" class="menu">
				<span class="icon icon-cross" id="cerrar-menu"></span>

				<div class="grupo">
					<div><a href="#inicio" class="cerrar"><span class="icon icon-home"></span>INICIO</a></div>
					
					<div><a href="#nosotros" class="cerrar"><span class="icon icon-rocket"></span>NOSOTROS</a></div>
					
					<div><a href="#miembros" class="cerrar"><span class="icon icon-users"></span>MIEMBROS</a></div>
				</div>

				<div class="grupo">
					<div><a href="Sirius/index.php"><span class="icon icon-open-book"></span>SIRIUS</a></div>
					
					<div><a href="Calendario/index.php"><span class="icon icon-calendar"></span>CALENDARIO</a></div>
					
					<div><a href="#contacto" class="cerrar"><span class="icon icon-mail"></span>CONTACTO</a></div>
				</div>

			</div>

			


		</nav>

		
		<!-- Slider main container -->
		<a name="inicio"><div class="swiper-container" id="inicio">
			

			<div class="title-swiper">
			EXPLORA<br />
			DESCUBRE<br/>
			DISFRUTA
			</div>
		    
		    <div class="swiper-wrapper">
		        
		        <div class="swiper-slide">
		        	<img src="Imagenes/bg-1.jpg"/>
		        </div>
		        <div class="swiper-slide">
		        	<img alt="" src="https://www.giss.nasa.gov/research/features/200711_temptracker/lunar_eclipse_lrg.jpg">
		        </div>
		        <div class="swiper-slide">
		        	<img src="https://fthmb.tqn.com/mOl7YESCeVYtBIm0BJe84p7BCwA=/2205x1360/filters:no_upscale():fill(FFCC00,1)/about/GettyImages-85758302-58990f833df78caebcff9ffe.jpg" alt="">
		        </div>

		    </div>
		    
		    <div class="swiper-pagination"></div>
		    
		   
		    <div class="swiper-button-prev icon icon-chevron-thin-left"></div>
		    <div class="swiper-button-next icon icon-chevron-thin-right"></div>
		  
		</div></a>

		<!-- Nosotros -->

		<div id="nosotros" class="nosotros">
			<h1><a name="nosotros">NOSOTROS</a></h1>
			<article>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum beatae, tenetur odit quas, magni mollitia aliquam assumenda ad id quasi doloribus sunt minima amet incidunt praesentium ullam neque at vitae aut perspiciatis ipsum, reiciendis iste ducimus soluta. Accusantium saepe numquam a deserunt hic ea ratione, officiis iusto neque tenetur vero, consequatur animi iure magnam nobis quaerat earum praesentium illo tempore similique laboriosam porro nesciunt dolorem laborum. Debitis, et, ad. Veritatis ex ipsum, possimus eos, modi blanditiis ipsam quibusdam, facere id quas repellendus necessitatibus aut? Et culpa harum ipsam laboriosam in! Omnis, dignissimos consequuntur libero repellendus laborum aspernatur doloremque ratione eligendi laboriosam quas quibusdam voluptatum sapiente, voluptate voluptatibus ad illo aliquam neque quis dolores minus explicabo ea nam rerum reprehenderit, consequatur! Dicta architecto quam, vel ad officiis impedit enim quae facere tempore harum dolorum temporibus aliquam quia dolorem cumque iure ea reprehenderit obcaecati odit quod doloremque sunt! Itaque voluptatum, deserunt praesentium eveniet possimus dolor laboriosam iusto, tempora fugit maxime explicabo!</article>
		</div>

		<!-- Equipo -->

		<div id="miembros" class="miembros">
			
			<h1><a name="miembros">MIEMBROS</a></h1>

			<!-- Miembros activos -->

			<div class="miembro">
				<img src="https://psicologiaymente.net/media/nJgn/personas-emocionales/default.jpg" alt="">
				<div class="nombre-miembro">Miembro N°1</div>
			</div>

			<div class="miembro">
				<img src="https://psicologiaymente.net/media/vbJN/personas-transmiten-energia-positiva-rasgos/default.jpg" alt="">
				<div class="nombre-miembro">Miembro N°2</div>
			</div>

			<div class="miembro">
				<img src="http://www.gravatar.com/avatar/24acd98e5d71a6a789488b4c049de9fe?s=200" alt="">
				<div class="nombre-miembro">Miembro N°3</div>
			</div>
					
		</div>

		<!-- Contacto -->

		<div id="contacto" class="contacto">
			
			<h1 class="titulo"><a name="contacto">CONTACTO</a></h1>

			<div class="mapa" id="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.174531938141!2d-66.88299768566321!3d10.407708992572363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDI0JzI3LjgiTiA2NsKwNTInNTAuOSJX!5e0!3m2!1sen!2sve!4v1504120152253" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="direccion">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores fugit vero doloribus deleniti, nam libero veniam optio, consectetur quidem eveniet.
			</div>

			<div class="formulario">

				<div class="comentario">
					Si quieres saber más de nosotros, o tienes alguna sugerencia, escríbenos.
				</div>

				<form method="post" action="Scripts/mail.php" id="formulario">
					<input name="nombre" type="text" maxlength="150" placeholder="Nombre" required />
					<input name="email" type="email" maxlength="150" placeholder="Correo" required />
					<textarea name="mensaje" id="mensaje" cols="30" rows="10" draggable="false" maxlength="500" placeholder="Escribe aquí tu comentario ..." required></textarea> 
					<input type="submit" class="btn btn1" />
				</form>
			</div>
		</div>

		<?php require 'includes/footer.php' ?>
	</div>

	<!--Javascript-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="dist/bundle.min.js"></script>
	<script src="js/subVerify.js"></script>

	<script>

		//Inicialización del Swiper

		var mySwiper = new Swiper('.swiper-container', {
		    speed: 400,
		    spaceBetween: 100,
		    autoplay: 5000,
		    autoplayDisableOnInteraction: false,
		    pagination: '.swiper-pagination',
		    paginationClickable: true,
		    nextButton: '.swiper-button-next',
		    prevButton: '.swiper-button-prev',
		    loop: true
		});   
	</script>

	
</body>
</html>
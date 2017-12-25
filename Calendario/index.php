<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Calendario</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<link rel="icon" href="../favicon.png" type="image/x-icon">

	<!-- Iconos -->
	<link rel="stylesheet" href="../CSS/style.css">
	<link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

	<div class="main">
		
		<nav id="nav">
			<img src="../Imagenes/guia-logo.svg" />
		
			<div id="menu-nav"></div>
		</nav>

		<div class="container">

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
				$diaActual = $arrayFecha[1]; 					//Dia actual


				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
			
			<div class="titulo-calendario">
				<?php echo strtoupper($mes1).' - '.strtoupper($mes2).' '.$arrayFecha[0]; ?>
			</div>

			<div class="presentacion">
				<div class="calendario">
					<div class="mes">
						<div class="icon"></div>
						<div class="mesBlock"><?php echo "$mesActual"; ?></div>
						<div class="icon"></div>
					</div>

					<div class="div-dias">
						
						<div class="dia-nombre dia-inicio">D</div>
						<div class="dia-nombre">L</div>
						<div class="dia-nombre">M</div>
						<div class="dia-nombre">M</div>
						<div class="dia-nombre">J</div>
						<div class="dia-nombre">V</div>
						<div class="dia-nombre dia-final">S</div>

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
					</div>
					<div class="detalles">
						<div>
							<h3>HORA</h3>
							<p>7:30 am - 9:30 am</p>
						</div>
						<div>
							<h3>LUGAR</h3>
							<p>EGE 001</p>
						</div>
					</div>	
				</div>
				
				
				<div class="imagen">
					<img src="ImagenesEventos/GUIA-flyerNuevos.jpg" alt="" />
					<div class="resumen">
						<h3>Título del Evento</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium iure iusto placeat quas fuga sit impedit ipsum veniam architecto! Numquam praesentium eaque, accusantium voluptates, qui tempore dolorem voluptas quam porro!</p>
					</div>
				</div>
			</div>
			

		</div>

		<?php require '../includes/footer.php' ?>

	</div>


	<!-- Javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="../dist/bundle.min.js"></script>
	
</body>
</html>
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

			<?php require '../Scripts/conexionDB.php'; ?>
			
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
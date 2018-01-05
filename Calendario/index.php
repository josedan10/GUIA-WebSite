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
			
			<div class="titulo-calendario">
				
				ENERO - MARZO 2018
				
			</div>

			<div class="presentacion">
				<div class="calendario" id="calendario">
					<div class="mes">
						<select id="mes">
						  <option value="0">Enero</option>
						  <option value="1">Febrero</option>
						  <option value="2">Marzo</option>
						</select>
					</div>

					<div class="contador" id="contador">
						<div>
							<h3>DIAS</h3>
							<div id="dias"></div>
						</div>
						<div>
							<h3>HORAS</h3>
							<div id="horas"></div>
						</div>
						<div>
							<h3>MINUTOS</h3>
							<div id="minutos"></div>
						</div>
						<div>
							<h3>SEGUNDOS</h3>
							<div id="segundos"></div>
						</div>
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
				
				
				<div class="imagen" id="imagenEvento">
					<img src="ImagenesEventos/GUIA-flyerNuevos.jpg" alt="" />
					<div class="resumen">
						<h3>Título del Evento</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium iure iusto placeat quas fuga sit impedit ipsum veniam architecto! Numquam praesentium eaque, accusantium voluptates, qui tempore dolorem voluptas quam porro!</p>
					</div>

				</div>
				<div id="eventoAux" class="evento-aux">
					No hay eventos este día
				</div>
			</div>
			

		</div>

		<?php require '../includes/footer.php' ?>
		
	</div>


	<!-- Javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="../dist/bundle.min.js"></script>
	<script src="../js/contador.js"></script>
	<script src="data-calendar.json"></script>
	<script src="../js/gen-calendar.js"></script>
	
</body>
</html>
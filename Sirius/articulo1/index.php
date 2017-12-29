<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title>SIRIUS</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/styles.css">
	<link rel="stylesheet" type="text/css" href="../../CSS/style.css">
</head>
<body>

	<div class="main">
		<nav id="nav">
			<img src="../../Imagenes/guia-logo.svg" />
		
			<div id="menu-nav"></div>
		</nav>

		

		<div class="blog">
			<?php
				//Conexión al servidor para extraer los datos del artículo
				//
				$server = "localhost";
				$bd = "guiabd";
				$user = "root";
				$pass = "Zedstaphplis07.";

				$conn = new mysqli($server, $user, $pass, $bd);

				if($conn->connect_error) die("Conexión fallida: ".$conn->connect_error);
				////////////////////////////////////////////////////////
				$Query = "SELECT * FROM articulo WHERE Titulo = 'Descubriendo más allá del Universo'";

				$resultado = $conn->query($Query);



				require '../../Scripts/Articulo.php';

				$titulo = "Descubriendo más allá del Universo";
				$autor = "Alan Brito Delgado";
				$fecha = "12/11/2018";
				$categorias = array("Sistema Solar", "Espacio Exterior");
				$contenido = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolore quibusdam hic consequuntur neque, illo impedit molestias numquam maxime eveniet in eligendi, voluptatem placeat distinctio ullam fugiat aliquam molestiae. Molestiae.";

				$articulo = new Articulo();

				$articulo->set_Articulo($titulo, $autor, $fecha, $categorias, $contenido);

				$articulo->construirArticulo();
			?>
		</div>
		
		<footer>
			
			<div class="social">
				<p>¡SÍGUENOS!<br /></p>
				<div class="icons">
					<a href=""><span class="icon icon-facebook-with-circle"></span></a>
					<a href=""><span class="icon icon-instagram-with-circle"></span></a>
					<a href=""><span class="icon icon-twitter-with-circle"></span></a>
				</div>
			</div>
			<div class="developer">Contacta al desarrollador: <br/><br />josedanq100@gmail.com</div>
		</footer>
	</div>

	<!-- Scripts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="../../dist/bundle.min.js"></script>
</body>
</html>
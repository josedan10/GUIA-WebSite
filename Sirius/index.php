<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	
	<link rel="icon" href="../favicon.png" type="image/x-icon">

	<title>SIRIUS</title>

	<!-- Iconos -->
	<link rel="stylesheet" href="../CSS/style.css">
	<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
</head>
<body>
	
	<div class="main">
		
		<nav id="nav">
			<img src="../Imagenes/guia-logo.svg" />
			<div id="menu-nav"></div>
		</nav>

		<!-- Blog -->

		<div class="blog" id="blog">
			<h1 class="title-blog">SIRIUS</h1>
			
			<!-- Articulos -->

			<article>
				<h2>Titulo del artículo</h2>
				<div class="atributos-articulo">
					<span class="icon icon-calendar"></span>31 de agosto de 2017
					<span class="icon icon-price-tag"></span>Sin categoria
				</div>

				<img src="articulo1/imgArticule1.jpeg" alt="">
				<div class="articulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil est, voluptates, totam quisquam quibusdam voluptas, odit ullam aliquam dolor repudiandae, neque obcaecati. Voluptate dolorum eius facere ipsam iusto, error non!</div>

				<a href="articulo1"><button type="button" class="btn">LEER MÁS</button></a>
			</article>

			<article>
				<h2>Titulo del artículo</h2>
				<div class="atributos-articulo">
					<span class="icon icon-calendar"></span>31 de agosto de 2017
					<span class="icon icon-price-tag"></span>Sin categoria
				</div>

				<img src="articulo1/imgArticule1.jpeg" alt="">
				<div class="articulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil est, voluptates, totam quisquam quibusdam voluptas, odit ullam aliquam dolor repudiandae, neque obcaecati. Voluptate dolorum eius facere ipsam iusto, error non!</div>

				<a href="articulo1"><button type="button" class="btn">LEER MÁS</button></a>
			</article>
			
			<article>
				<h2>Titulo del artículo</h2>
				<div class="atributos-articulo">
					<span class="icon icon-calendar"></span>31 de agosto de 2017
					<span class="icon icon-price-tag"></span>Sin categoria
				</div>

				<img src="articulo1/imgArticule1.jpeg" alt="">
				<div class="articulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil est, voluptates, totam quisquam quibusdam voluptas, odit ullam aliquam dolor repudiandae, neque obcaecati. Voluptate dolorum eius facere ipsam iusto, error non!</div>

				<a href="articulo1"><button type="button" class="btn">LEER MÁS</button></a>
			</article>
			
			<!-- Busqueda -->

			<div class="busqueda">
				<input type="text" placeholder="Buscar" id="input-buscar"/>
				<span class="icon icon-magnifying-glass"></span>
			</div>

			<div id="publicaciones-recientes" class="bloques-de-links">

				<h2>Publicaciones recientes</h2>
				<ul>
					<li><a href="#">Publicacion 1</a></li>
					<li><a href="#">Publicacion 2</a></li>
					<li><a href="#">Publicacion 3</a></li>
				</ul>
			</div>

			<div id="archivos" class="bloques-de-links">
				
				<h2>Archivo</h2>
				<ul>
					<li><a href="">Septiembre 2017</a></li>
					<li><a href="">Octubre 2017</a></li>
					<li><a href="">Noviembre 2017</a></li>
					<li><a href="">Diciembre 2017</a></li>
				</ul>

			</div>

			<div id="categorias" class="bloques-de-links">
				<h2>Categorías</h2>
				<ul>
					<li><a href="">Categoria 1</a></li>
					<li><a href="">Categoria 2</a></li>
					<li><a href="">Categoria 3</a></li>
				</ul>
			</div>

			<div id="subscripcion" class="suscripcion">

				<div class="info">
					Si deseas mantenerte al día con nuestro blog, te invitamos a que te suscribas y seas parte de nuestra comunidad.
					<br /> <br />
					¡CIELOS CLAROS!
				</div>

				<div class="formulario">

					<h2>Ingresa tus datos</h2>

					<form id="formulario" action="../Scripts/mail.php" method="post">
						<input type="text" maxlength="150" placeholder="Nombre" name="nombre" required>
						<input type="text" maxlength="150" placeholder="Correo" name="email" required>
						<input type="submit" class="btn btn2" value="Enviar">
					</form>
				</div>
			</div>

		</div>

		<?php include '../includes/footer.php'; ?>

	</div>


	<!-- Javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="../dist/bundle.min.js"></script>
	<script src="../js/subVerify.js"></script>
		

</body>
</html>
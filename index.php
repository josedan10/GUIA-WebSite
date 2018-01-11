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

	
	<div class="app">

		<nav id="nav">
			<img src="Imagenes/guia-logo.svg" />
		
			<div id="menu-nav"></div>
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
			<article>Desde hace más de veinte años, el Grupo Universitario de Investigaciones Astronómicas de la Universidad Simón Bolívar ha mantenido de manera ininterrumpida su mirada en los cielos, observando y aprendiendo sobre todo lo que yace allí afuera en el insondable vacío del espacio, el Cosmos.
			<br />
			Numerosas generaciones de estudiantes universitarios, muchos de ellos ya hoy en día exitosos egresados de la USB, han formado parte de esta agrupación a lo largo de los años, cada uno de ellos asegurándose siempre de fomentar y divulgar sus conocimientos con la Universidad y más allá de ella. Con charlas especiales y conferencias, una gran cantidad de profesores e investigadores invitados, especialistas en Astronomía, Astrofísica, Cosmología, Aeronáutica, entre otras ramas del estudio del espacio, han aportado su pequeño grano de arena en el proceso de formación astronómica y desarrollo del pensamiento de estos jóvenes estudiantes uesebistas, quienes a su vez contribuyen con cada charla, cada sesión de observación nocturna o solar, cada curso o taller, al crecimiento de la madre de todas las ciencias, la Astronomía.</article>
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

				<form method="post" action="Scripts/contacto.php" id="formulario">
					<input name="nombre" type="text" maxlength="150" placeholder="Nombre" required />
					<input name="email" type="email" maxlength="150" placeholder="Correo" required />
					<textarea name="mensaje" id="mensaje" cols="30" rows="10" draggable="false" maxlength="500" placeholder="Escribe aquí tu comentario ..." required></textarea> 
					<input type="submit" class="btn btn1" value="Enviar"/>
				</form>
			</div>
		</div>

		<?php require 'includes/footer.php' ?>
	</div>

	<!--Javascript-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="dist/bundle.min.js"></script>
	<script src="js/Scroll.js"></script>
	<script src="js/subVerify.js"></script>

	<script>

		//Inicialización del Swiper

		var mySwiper = new Swiper('.swiper-container', {
		    speed: 400,
		    spaceBetween: 0,
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
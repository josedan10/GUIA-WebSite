//Ajuste de la barra de busqueda
$(document).ready(function(){

	var barra = $('#input-buscar');
	var mapa = $("#mapa");
	var moduloContacto = $("#contacto");
	var formulario = $("#formulario");
	var swiperContainer = $('#inicio');

	function responsive(){

		var anchoNavegador = $(window).width();
		var largoNavegador = $(window).height();

		//Barra de búsqueda del blog
		if(barra != null && barra != undefined){
			barra.css("width",$("#blog").width() - 60);
		}
		
		//Mapa de modulo de Contacto
		if(mapa != null && mapa != undefined){
			
			if(anchoNavegador < 500){
				mapa.width(anchoNavegador - 50);
				mapa.height((anchoNavegador * 3) / 4);
			}else{
				mapa.width(anchoNavegador - 100);
				mapa.height(330);
			}
		}

		//Formulario del modulo de Contacto
		if(formulario != null && formulario != undefined){

			if (anchoNavegador < 300){
				formulario.width(anchoNavegador - 120);
			}

		}

		//Ajuste del tamaño del swiper
		if(swiperContainer != null && swiperContainer != undefined){

			if(largoNavegador > 460){

				swiperContainer.height(largoNavegador - 74);
			}
		}


	}

	responsive();

	$(window).resize(responsive);
});

		
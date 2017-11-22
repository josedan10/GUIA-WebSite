$(document).ready(function(){

	var menu = $("#menu");

	$('#menu-icon').click(function(){
		/*Desplegamos el menu*/

		menu.css("display", "flex");
		menu.height($(window).height());
		$('body').css("overflow", "hidden");
		
	});

	//Redimensionamiento automático
	$(window).resize(function(){

		menu.css("height",$(this).height());
	})

	//Cerramos el menu
	var cerrarIcon = $("#cerrar-menu");
	cerrarIcon.click(function(){
		menu.css("display", "none");
		$('body').css("overflow", "scroll");
	})

});
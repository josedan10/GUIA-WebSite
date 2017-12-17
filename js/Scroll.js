$(document).ready(function(){

	//Este script controla la animación de slide de los enlaces que hay en la nav-bar

	var	linkInicio = $("a[href='#inicio']"),
		linkNosotros = $("a[href='#nosotros']"),
		linkMiembros = $("a[href='#miembros']"),
		linkContacto = $("a[href='#contacto']");

	var menu = $("#menu");


	linkInicio.click(animacionDeScroll);
	linkNosotros.click(animacionDeScroll);
	linkMiembros.click(animacionDeScroll);
	linkContacto.click(animacionDeScroll);

	function animacionDeScroll(event){

		// Verificamos que el hash no sea nulo o undefined
	    if (this.hash !== "") {
		    // Prevent default anchor click behavior
		    event.preventDefault();

		    // Guardamos el hash
		    var hash = this.hash;
		    menu.css("display", "none");

	    	if(hash == "#inicio"){
		      	
	      		//En este la posicion es 0 absoluta
	      		$('html, body').animate({
			        scrollTop: 0
			    }, 800, function(){
			   
			    // Agregamos el hash (#) al URL cuando haga scroll (default click behavior)
			        window.location.hash = "";
			   		
			    });

	      	}else{


		    	var posicionDelHash = $(hash).offset().top;

			    // El valor (800) es el tiempo de la animacion en ms
			    $('html, body').animate({
			        scrollTop: posicionDelHash
			    	}, 800, function(){
			   
			    // Agregamos el hash (#) al URL cuando haga scroll (default click behavior)
			        window.location.hash = hash;
			        
			    });
			}
	     
	    } 

	}

});
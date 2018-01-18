$(document).ready(function(){

	var meses = [];
	var mes = new Date().getMonth();


	function genDia(clase = ["dia"]){

		//Esta función recibe un arreglo con las clases que tendrá cada bolita del día
		
		var div = $("<div></div>");

		clase.forEach(function(string){
			div.addClass(string);
		});

		return div;
	};

	function fijarEvento(evento, diaEvento){
		//Esta función recibe como parámetros una variable booleana que indica si hay o no un evento y el día del evento
		//
		//Los tipos del contador son:
		//'1' si el evento no ha empezado
		//'2' si el evento ya empezó pero no ha culminado
		//'0' si el evento ya terminó
		//
		
		let contador = $("#contador"),
			imgCalendario = $("#imagenEvento"),
			eventoAux = $("#eventoAux"),
			detallesEvento = $("#detalles"),
			horaDetalles = detallesEvento.children[0];
			diaActual = this.innerHTML;
		
		if(evento){

			Reloj.horaInicio = diaEvento.inicio;
			Reloj.fecha = diaEvento.fecha;

			tiempoRestante = Reloj.tiempoRestante(); 

			if(tiempoRestante <= 0){
				//El evento ya ha comenzado
				Reloj.horaInicio = diaEvento.final;
				tiempoRestante = Reloj.tiempoRestante();

				if(tiempoRestante <= 0){
					//El evento ya terminó
					$("#calendario h3")[0].innerHTML = "ESTE EVENTO HA CULMINADO";
					contador.css("display", "none");
				}else{
					$("#calendario h3")[0].innerHTML = "ESTE EVENTO TERMINA EN";
					Reloj.contador = setInterval(Reloj.iniciarConteo, 1000);	//fijamos el intervalo del contador al final del evento
					contador.css("display", "flex");
				}

			}else{
				$("#calendario h3")[0].innerHTML = "EL EVENTO EMPIEZA EN";
				Reloj.contador = setInterval(Reloj.iniciarConteo, 1000);	//fijamos el intervalo del contador al inicio del evento
				contador.css("display", "flex");
			}
			///////////////////////////////////////////////////////////////////////////////////
			
			//Bloques
			imgCalendario.css("display", "block");
			imgCalendario[0].children[1].children[0].innerHTML = diaEvento.titulo;
			imgCalendario[0].children[1].children[1].innerHTML = diaEvento.resumen;

			detallesEvento.css("display", "flex");
			eventoAux.css({"display": "none", "width": "0"});
			detalles.children[0].children[1].innerHTML = diaEvento.inicio + " - " + diaEvento.final;
			detalles.children[1].children[1].innerHTML = diaEvento.lugar;
			///////////////////////////////////////////////////////////////

		}else{
			clearInterval(Reloj.contador);
			imgCalendario.css("display", "none");
			eventoAux.css({"display": "flex", "width": "50%"});
			detallesEvento.css("display", "none");
			contador.css("display", "none");
			$("#calendario h3")[0].innerHTML = "";
		}
		
		
	}


	function cambiarDia(event){
		//Recorremos todas las clases y vemos si alguna dice dia-evento
		//Verificamos si hay evento ese día
		let evento = false;
		
		this.classList.forEach(clase => {if(clase === "dia-evento") evento = true});

		//Antes de agregar la clase "dia" verificamos si hay un evento para usar "dia-evento" en vez de "dia" en el día seleccionado anteriormente
		
		let valorDiaAnterior = $(".dia-actual")[0].innerHTML,
			valorSelect = $("#mes")[0].value,						//índice para recorrer el arreglo del objeto calendar
			mesLlave = calendar.listaDeMeses[valorSelect],			//llave del mes mostrado actualmente
			mesActual = calendar[mesLlave];

		
		if(mesActual.eventos[valorDiaAnterior] !== undefined){
			//Lleva la clase "dia-evento"
			
			$(".dia-actual").addClass("dia-evento");
			$(".dia-actual").removeClass("dia-actual");
			
		}else{
			//Es un día normal
			
			$(".dia-actual").addClass("dia");
			$(".dia-actual").removeClass("dia-actual");
		}


		//Marcamos el día que hace click el usuario
		$(this).addClass("dia-actual");
		$(this).removeClass("dia");

		fijarEvento(evento, mesActual.eventos[$(this)[0].innerHTML]);

		event.preventDefault();
	}


	function cambiarCalendario(event){

		//Esta función oculta y muestra los calendarios usando el select

		var meses = document.getElementsByClassName("div-dias");
	
		for(let i = 0; i < meses.length; i++){			

			if(parseInt(this.value) != i){
				meses[i].style.display = "none";
			}else{
				meses[i].style.display = "flex";
			}
		}

		event.preventDefault();
	}


	calendar.listaDeMeses.forEach(elemento => {

		var calendario = $("#calendario");							//div#calendario que está en el DOM
		
		var divDias = $("<div class='div-dias'></div>");			//Div donde agregaremos cada elemento

		var diaInicio = calendar[elemento].inicio,
			diaFinal = calendar[elemento].dias,
			fechaActual = new Date(),
			diaActual = fechaActual.getDate(),
			divDia,
			mesActual = calendar[elemento],
			mesElemento = mesActual.mes,
			dias = ["D", "L", "M", "M", "J", "V", "S"],
			evento = false;

		//Agregamos las letras de los días
		
		dias.forEach(function(letra){
			switch(letra){
				case "D":
					divDia = genDia(["dia-nombre", "dia-inicio"]);
					divDias.append(divDia.text(letra));
					break;

				case "S":
					divDia = genDia(["dia-nombre", "dia-final"]);
					divDias.append(divDia.text(letra));
					break;

				default:
					divDia = genDia(["dia-nombre"]);
					divDias.append(divDia.text(letra));
					break;
			}
		});

		//Agregamos el resto de los días
		
		for(let i = 1, dia = 1; i <= 42; i++){

			if(i < diaInicio || dia > diaFinal){

				//Días inválidos

				if(i % 7 == 0){

					divDias.append(genDia(["dia-inactivo", "dia-final"]));

				}else if(i % 7 == 1){

					divDias.append(genDia(["dia-inactivo", "dia-inicio"]));

				}else{

					divDias.append(genDia(["dia-inactivo"]));

				}

			}else{

				//Días válidos

				switch(dia){


					case diaActual:

						var contador = $("#contador");
						var imgCalendario = $("#imagenEvento");
						var eventoAux = $("#eventoAux");
						var detallesEvento = $("#detalles");
						var evento = false;

						
						if(calendar[elemento]["eventos"][dia] !== undefined){							
							evento = true;												//Variable indicadora de evento
						}




						if(mes == parseInt(mesElemento)){


							if(i % 7 == 0){

								
								divDia = genDia(["dia-actual", "dia-final"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));					

							}else if(i % 7 == 1){

								divDia = genDia(["dia-actual", "dia-inicio"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));								

							}else{

								divDia = genDia(["dia-actual"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));
								
							}

							fijarEvento(evento, mesActual.eventos[diaActual]);


						}else{
							if(i % 7 == 0){

								if(evento){
									divDia = genDia(["dia-evento", "dia-final"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}else{
									divDia = genDia(["dia", "dia-final"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}

							}else if(i % 7 == 1){

								if(evento){
									divDia = genDia(["dia-evento", "dia-inicio"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}else{
									divDia = genDia(["dia", "dia-inicio"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}

							}else{

								if(evento){
									divDia = genDia(["dia-evento"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));

								}else{
									divDia = genDia();
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}

							}
						}

						dia++;
						evento = false;
						break;

					default:

						if(calendar[elemento]["eventos"][dia] !== undefined){
							evento = true;
						}

						if(i % 7 == 0){

							if(evento){
								divDia = genDia(["dia-evento", "dia-final"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));
							}else{
								divDia = genDia(["dia", "dia-final"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));
							}

						}else if(i % 7 == 1){

							if(evento){
								divDia = genDia(["dia-evento", "dia-inicio"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));
							}else{
								divDia = genDia(["dia", "dia-inicio"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));
							}

						}else{

							if(evento){
								divDia = genDia(["dia-evento"]);
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));

							}else{
								divDia = genDia();
								divDia.click(cambiarDia);
								divDias.append(divDia.text(dia));
							}

						}

						dia++;
						evento = false;
						break;

				}
						
			}


		}

		meses.push(divDias);		//Agregamos al divDias
	});

	//Agregamos los meses al DOM

	var calendario = $("#calendario");
	var contador = calendario.children("div.contador")[0];
	var mesSelect = $("#mes");

	mesSelect.change(cambiarCalendario);

	for(let i = 0; i < meses.length; i++){

		if(parseInt(mesSelect[0].value) != i){
			meses[i].css("display", "none");
		}

		$("#calendario h3")[0].before(meses[i][0]);	//Los colocamos antes del contador
	}

});
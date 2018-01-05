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


	function cambiarDia(){
		//Recorremos todas las clases y vemos si alguna dice dia-evento
		
		var contador = $("#contador");
		var imgCalendario = $("#imagenEvento");
		var eventoAux = $("#eventoAux");
		var evento = false;

		console.log(this.classList);

		this.classList.forEach(clase => {if(clase === "dia-evento") evento = true});

		if(evento){
			//mostramos evento
			alert("Hoy hay un evento");
		}else{

			clearInterval(Reloj.contador);
			imgCalendario.css("display", "none");
			eventoAux.css({"display": "block", "width": "50%", "background": "blue"});

		}

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
			mesElemento = calendar[elemento].mes,
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

						if(calendar[elemento]["eventos"][dia] !== undefined){
							//Hay un evento ese día
							evento = true;
						}

						if(mes == parseInt(mesElemento)){


							if(i % 7 == 0){

								if(evento){
									divDia = genDia(["dia-evento", "dia-final"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}else{
									divDia = genDia(["dia-actual", "dia-final"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}						

							}else if(i % 7 == 1){

								if(evento){
									divDia = genDia(["dia-evento", "dia-inicio"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}else{
									divDia = genDia(["dia-actual", "dia-inicio"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}
								

							}else{

								if(evento){
									divDia = genDia(["dia-evento"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));

								}else{
									divDia = genDia(["dia-actual"]);
									divDia.click(cambiarDia);
									divDias.append(divDia.text(dia));
								}

							}


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
	var mes = $("#mes");

	mes.change(cambiarCalendario);

	for(let i = 0; i < meses.length; i++){

		if(parseInt(mes[0].value) != i){
			meses[i].css("display", "none");
		}

		contador.before(meses[i][0]);	//Los colocamos antes del contador
	}

});
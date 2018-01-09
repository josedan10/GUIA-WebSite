/*
	1000 milisegundo ---------- 1 segundo
	60 segundos --------------- 1 minuto
	60 minutos ---------------- 1 hora
	24 horas ------------------ 1 día


	60000 milisegundos -------- 1 minuto
	3600000 milisegundos ------ 1 hora
	86400000 milisegundos ----- 1 día

*/

// class Reloj{
// 	constructor(){
// 		this.dias = 0;
// 		this.horas = 0;
// 		this.minutos = 0;
// 		this.segundos = 0;
// 		this.contador = 0;
// 	}

// 	iniciarConteo(fecha, hora){
// 		var diaEvento = new Date("2018-"+fecha+"T"+hora+":00Z");
// 		var hoy = new Date();

// 		var diferencia = diaEvento.getTime() - hoy.getTime();

// 		//Primero pasamos de milisegundos a segundos
// 		this.segundos = Math.floor(diferencia / 1000);		//Segundos parciales

// 		//Después pasamos de segundos a minutos
// 		this.minutos = Math.floor(this.segundos / 60); 		//Minutos parciales
// 		this.segundos = this.segundos % 60; 				//Segundos restantes

// 		//Pasamos de minutos a horas
// 		this.horas = Math.floor(this.minutos / 60);			//Horas parciales
// 		this.minutos = this.minutos % 60;					//Minutos restantes

// 		//Pasamos de horas a días
// 		this.dias = Math.floor(this.horas / 24);			//Dias restantes
// 		this.horas = this.horas % 24;						//Horas restantes

// 		var dias = document.getElementById("dias"),
// 			horas = document.getElementById("horas"),
// 			minutos = document.getElementById("minutos"),
// 			segundos = document.getElementById("segundos");

// 		//Apariencia con los condicionales
		
// 		if(this.dias < 10) dias.innerHTML = "0" + this.dias;
// 		else dias.innerHTML = this.dias;

// 		if(this.horas < 10) horas.innerHTML = "0" + this.horas;
// 		else horas.innerHTML = this.horas;

// 		if(this.minutos < 10) minutos.innerHTML = "0" + this.minutos;
// 		else minutos.innerHTML = this.minutos;

// 		if(this.segundos < 10) segundos.innerHTML = "0" + this.segundos;
// 		else segundos.innerHTML = this.segundos;

// 	};
// }

var Reloj = {

	dias: 0,
	horas: 0,
	minutos: 0,
	segundos: 0,
	fecha: "01-09",
	horaInicio: "07:00",
	contador: null,

	tiempoRestante: function(){
		//Esta función devuelve la diferencia de tiempo entre la hora actual y el tiempo indicado para el inicio del conteo
		
		var date = "2018-"+Reloj.fecha+"T"+Reloj.horaInicio+":00Z";
		var diaEvento = new Date(date);
		var hoy = new Date();

		return diaEvento.getTime() - hoy.getTime();
	},

	iniciarConteo: function(){
		var diferencia = Reloj.tiempoRestante;

		//Primero pasamos de milisegundos a segundos
		Reloj.segundos = Math.floor(diferencia / 1000);		//Segundos parciales

		//Después pasamos de segundos a minutos
		Reloj.minutos = Math.floor(Reloj.segundos / 60); 	//Minutos parciales
		Reloj.segundos = Reloj.segundos % 60; 				//Segundos restantes

		//Pasamos de minutos a horas
		Reloj.horas = Math.floor(Reloj.minutos / 60);		//Horas parciales
		Reloj.minutos = Reloj.minutos % 60;					//Minutos restantes

		//Pasamos de horas a días
		Reloj.dias = Math.floor(Reloj.horas / 24);			//Dias restantes
		Reloj.horas = Reloj.horas % 24;						//Horas restantes

		var dias = document.getElementById("dias"),
			horas = document.getElementById("horas"),
			minutos = document.getElementById("minutos"),
			segundos = document.getElementById("segundos");

		//Apariencia con los condicionales
		
		if(Reloj.dias < 10) dias.innerHTML = "0" + Reloj.dias;
		else dias.innerHTML = Reloj.dias;

		if(Reloj.horas < 10) horas.innerHTML = "0" + Reloj.horas;
		else horas.innerHTML = Reloj.horas;

		if(Reloj.minutos < 10) minutos.innerHTML = "0" + Reloj.minutos;
		else minutos.innerHTML = Reloj.minutos;

		if(Reloj.segundos < 10) segundos.innerHTML = "0" + Reloj.segundos;
		else segundos.innerHTML = Reloj.segundos;

	}
};

// var miReloj = new Reloj();

// miReloj.contador = setInterval(miReloj.iniciarConteo("05-05","07:00"), 1000);
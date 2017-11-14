$(document).ready(function(){

	//Validación del formulario de subscripción.
	var formulario = $("#formulario"),
		inputNombre = formulario.children("input:first-child"),
		inputCorreo = formulario.children("input:nth-child(2)");

	formulario.submit(validarFormulario);

	function validarFormulario(e){

		var emailPatt = /^[a-z]*([\.-_+]*|\w*)@\w+[\.-_]*\w*(\.\w{2,4})$/;
		var nombrePatt = /(^[a-zñ'áéíóú]{3,}(\s[a-zñ'áéíóú]+)*)$/;


		//Verificamos que no estén vacíos los campos
		if(inputNombre.val() == ""){

			alert("Introduzca su Nombre, por favor.");
			inputNombre.css({"box-shadow": "0px 0px 3px red"});
			inputNombre.focus(function(){
				inputNombre.css({"box-shadow": "0px 0px 3px red", "-webkit-box-shadow": "0px 0px 3px red"});
			});
			e.preventDefault();

		}else if(inputCorreo.val() == ""){

			alert("Introduzca una dirección de correo válida");
			inputCorreo.css({"box-shadow": "0px 0px 3px red"});
			inputCorreo.focus(function(){
				inputCorreo.css({"box-shadow": "0px 0px 3px red"});
			});
			e.preventDefault();

		}else{

			//Verificamos que coincidan con las expresiones regulares
			if(!(emailPatt.test(inputCorreo.val().toLowerCase()))){

				alert("Introduzca una dirección de correo válida");
				inputCorreo.css({"box-shadow": "0px 0px 5px red"});
				inputCorreo.focus(function(){
					inputCorreo.css({"box-shadow": "0px 0px 3px red"});
				});
				e.preventDefault();

			}else if(!(nombrePatt.test(inputNombre.val().toLowerCase()))){

				alert("Introduzca un nombre válido");
				inputNombre.css({"box-shadow": "0px 0px 5px red"});
				inputNombre.focus(function(){
					inputNombre.css({"box-shadow": "0px 0px 3px red"});
				});
				e.preventDefault();

			}

		}


	}
	
})
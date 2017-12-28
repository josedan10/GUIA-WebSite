import React from 'react';
import ReactDOM from 'react-dom';

// export default class NavBar extends React.Component{
	
// 	constructor(props){
// 		super(props);
// 	}

// 	imgSrc(){

// 		//La ruta de la imagen es distinta dependiendo del path actual
// 		var ruta = "";
// 		const paths = ['/GUIA-Website/Sirius/', '/GUIA-Website/Calendario/'];
// 		const articulo = /[/]GUIA-WebSite[/]Sirius[/]\w+(\s|\w|[-.+])+/;

// 		const links = {
// 			articulo: "../../Imagenes/guia-logo.svg",
// 			seccion: "../Imagenes/guia-logo.svg",
// 			inicio: "Imagenes/guia-logo.svg"
// 		}

// 		switch(location.pathname){

// 			case paths[0]:
// 			case paths[1]:

// 				ruta = links.seccion;
// 				break;

// 			default:

// 				if(articulo.test(location.pathname)){  	//Estamos en un artículo
// 					ruta = links.articulo;
// 				}else{									//Estamos en el inicio
// 					ruta = links.inicio;
// 				}

// 				break;
// 		}

// 		return ruta;
// 	}

// 	render(){
// 		<nav id="nav">
// 			<img src={this.imgSrc()} />
// 			<MenuNav />
// 		</nav>
// 	}
// }


class NavLink extends React.Component{

	

	constructor(ruta, paths, articulo, links, props){

		super(props);
	}

	asignarRuta(){

		var ruta = "";

		const paths = ['/GUIA-Website/Sirius/', '/GUIA-Website/Calendario/'];
		const articulo = /\/GUIA-Website\/Sirius\/\w+\/\w+[.]\w+/;
		// const paths = ['/Sirius/', '/Calendario/'];
		// const articulo = /\/Sirius\/\w+\/\w+[.]\w+/;

		//IMPORTANTE:
		//Al subir los archivos a las páginas se debe modificar la ruta porque no estarán en la
		//carpeta 'GUIA-WebSite'
		
		const links = {
							Sirius:
								{inicio: '../', local: '../index.php#', 
							 	calendario: '../Calendario/',blog: '#'},

							Calendario:
								{inicio: '..', local: '../index.php#', 
							 	calendario: '#', blog: '../Sirius/'},

							Articulo:
								{inicio: '../../', local: '../../index.php#',
						 		calendario: '../../Calendario/', blog: '../'},

						 	Inicio:
								{inicio: '#inicio', local: '#', 
								calendario: 'Calendario/', blog: 'Sirius/'}
					};

		//Dependiendo de la ruta actual, se usan direcciones diferentes
		switch (location.pathname){

			case paths[0]:
				//Estamos en el blog de Sirius
				
				switch (this.props.value){

					case 'inicio':

						ruta = links.Sirius.inicio;
						break;

					case 'nosotros':
					case 'contacto':
					case 'miembros':

						ruta = links.Sirius.local + this.props.value;
						break;

					case 'Calendario':

						ruta = links.Sirius.calendario;
						break;

					case 'Sirius':

						ruta = links.Sirius.blog;
						break;
				}
				
				break;

			case paths[1]:
				//Estamos en el Calendario
				
				switch (this.props.value){

					case 'inicio':

						ruta = links.Calendario.inicio;
						break;

					case 'nosotros':
					case 'contacto':
					case 'miembros':

						ruta = links.Calendario.local + this.props.value;
						break;

					case 'Calendario':

						ruta = links.Calendario.calendario;
						break;

					case 'Sirius':

						ruta = links.Calendario.blog;
						break;
				}
				
				break;

			default:

				console.log(articulo.test(location.pathname));
				
				
				if(articulo.test(location.pathname)){	//Estamos en algún artículo

					switch (this.props.value){

						case 'inicio':

							ruta = links.Articulo.inicio;
							break;

						case 'nosotros':
						case 'contacto':
						case 'miembros':

							ruta = links.Articulo.local + this.props.value;
							break;

						case 'Calendario':

							ruta = links.Articulo.calendario;
							break;

						case 'Sirius':

							ruta = links.Articulo.blog;
							break;
					}

				}else{										//Estamos en alguna parte del inicio
					
					switch (this.props.value){

						case 'inicio':

							ruta = links.Inicio.inicio;
							break;

						case 'nosotros':
						case 'contacto':
						case 'miembros':

							ruta = links.Inicio.local + this.props.value;
							break;

						case 'Calendario':

							ruta = links.Inicio.calendario;
							break;

						case 'Sirius':

							ruta = links.Inicio.blog;
							break;
					}
			
				}

				break;
		}

		return ruta;

	}

	asignarIcono(icono){

		switch(icono){
			case 'inicio':
				return "icon icon-home";
				break;

			case 'nosotros':
				return "icon icon-rocket";
				break;

			case 'miembros':
				return "icon icon-users";
				break;

			case 'Calendario':
				return "icon icon-calendar";
				break;

			case 'Sirius':
				return "icon icon-open-book";
				break;

			case 'contacto':
				return "icon icon-mail";
				break;
		}
	}
	
	
	render(){

		if(this.props.tipo == "2"){

			//Nav móvil
			return(
				<a href={this.asignarRuta()}><span className={this.asignarIcono(this.props.value)}></span>{this.props.value.toUpperCase()}</a>
			);
		}else{

			//Nav standard
			return(
				<a href={this.asignarRuta()}>{this.props.value.toUpperCase()}</a>
			);
		}
	}
}


export class MenuNav extends React.Component{

	constructor(props){
		super(props);
	}

	render(){

		if(window.innerWidth > 900){
			///////////////////////////////////////////////////////////////////////////////////////////
			///
			///jQuery
			$(function(){
				
				var nav = $('#nav');
				nav.addClass('nav1');	//Agregamos la clase nav1 para pantallas 'grandes'
			});
			///
			///
			//////////////////////////////////////////////////////////////////////////////////////////

			const pathNames = ['contacto', 'Calendario', 'Sirius', 'miembros', 'nosotros', 'inicio'];

			return(
				<ul>
					{pathNames.map((link) => <li><NavLink value={link} key={link} tipo="1" /></li>)}
				</ul>
			);

		}else{

			//////////////////////////////////////////////////////////////////////////////////////////////////
			///
			///jQuery
			$(function(){

				var nav = $('#nav');

				nav.addClass('nav2');					//Agregamos la clase nav2 para pantallas 'pequeñas'

				var menu = $("#menu");

				
				menu.css("height",$(this).height());	//Adaptamos el menu a la pantalla

				
				$('#menu-icon').click(function(){		//Desplegar menu

					menu.css("display", "flex");
					menu.height($(window).height());
					$('body').css("overflow", "hidden");
					
				});

				
				var cerrarIcon = $("#cerrar-menu");		//Cerrar el menu
				cerrarIcon.click(function(){
					menu.css("display", "none");
					$('body').css("overflow", "scroll");
				});

			});
			////////////////////////////////////////////////////////////////////////////////////////////////////

			return(

				<div>
					<span className="icon icon-menu" id="menu-icon"></span>

					<div id="menu" className="menu">
						<span className="icon icon-cross" id="cerrar-menu"></span>

						<div className="grupo">
							<div><NavLink value="inicio" tipo="2"/></div>
							
							<div><NavLink value="nosotros" tipo="2"/></div>
							
							<div><NavLink value="miembros" tipo="2"/></div>
						</div>

						<div className="grupo">
							<div><NavLink value="Sirius" tipo="2"/></div>
							
							<div><NavLink value="Calendario" tipo="2"/></div>
							
							<div><NavLink value="contacto" tipo="2"/></div>
						</div>

					</div>
				</div>
			);
		}
	}

}


import React from 'react';
import ReactDOM from 'react-dom';


class NavLink extends React.Component{

	

	constructor(ruta, paths, articulo, links, props){

		super(props);
		this.state = "";
		
	}

	asignarRuta(){

		var ruta = "";
		var paths = ['/Sirius/', '/Calendario/'];
		var articulo = /[/]Sirius[/]\w+(\s|\w|[-.+])+/;
		var links = {
							Sirius:
								{inicio: '../', local: '../index.php#', 
							 	calendario: '../Calendario/',blog: '#'},

							Calendario:
								{inicio: '../', local: '../index.php#', 
							 	calendario: '#', blog: '../Sirius/'},

							Articulo:
								{inicio: '../../', local: '../../index.php#/',
						 		calendario: '../../Calendario/', blog: '../'},

						 	Inicio:
								{inicio: '#', local: '#', 
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


	
	
	render(){
		const link = this.asignarRuta();
		return(
			<a href={link}>{this.props.value.toUpperCase()}</a>
		);
	}
} //export default NavLink;


class Menu extends React.Component{

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

			return(
				<ul>
					<li><NavLink value="contacto"/></li>
					<li><NavLink value="Calendario"/></li>
					<li><NavLink value="Sirius"/></li>
					<li><NavLink value="miembros"/></li>
					<li><NavLink value="nosotros"/></li>
					<li><NavLink value="inicio"/></li>
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
							<div><span className="icon icon-home"></span><NavLink value="inicio" /></div>
							
							<div><span className="icon icon-rocket"></span><NavLink value="nosotros" /></div>
							
							<div><span className="icon icon-users"></span><NavLink value="miembros" /></div>
						</div>

						<div className="grupo">
							<div><span className="icon icon-open-book"></span><NavLink value="Sirius"/></div>
							
							<div><span className="icon icon-calendar"></span><NavLink value="Calendario" /></div>
							
							<div><span className="icon icon-mail"></span><NavLink value="contactoS" /></div>
						</div>

					</div>
				</div>
			);
		}
	}

} export default Menu;


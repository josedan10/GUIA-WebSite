import React from 'react';
import ReactDOM from 'react-dom';


class Menu extends React.Component{

	render(){
		if(window.innerWidth > 900){

			return(
				<ul>
					<li><a href="../index.php#contacto">CONTACTO</a></li>
					<li><a href="../Calendario/index.php">CALENDARIO</a></li>
					<li><a href="index.php">SIRIUS</a></li>
					<li><a href="../index.php#miembros">MIEMBROS</a></li>
					<li><a href="../index.php#nosotros">NOSOTROS</a></li>
					<li><a href="../index.php">INICIO</a></li>
				</ul>
			);
		}else{

			console.log(window.innerHeight);

			return(

				<div>
					<span className="icon icon-menu" id="menu-icon"></span>

					<div id="menu" className="menu">
						<span className="icon icon-cross" id="cerrar-menu"></span>

						<div className="grupo">
							<div><a href="#inicio" className="cerrar"><span className="icon icon-home"></span>INICIO</a></div>
							
							<div><a href="#nosotros" className="cerrar"><span className="icon icon-rocket"></span>NOSOTROS</a></div>
							
							<div><a href="#miembros" className="cerrar"><span className="icon icon-users"></span>MIEMBROS</a></div>
						</div>

						<div className="grupo">
							<div><a href="Sirius/index.php"><span className="icon icon-open-book"></span>SIRIUS</a></div>
							
							<div><a href="Calendario/index.php"><span className="icon icon-calendar"></span>CALENDARIO</a></div>
							
							<div><a href="#contacto" className="cerrar"><span className="icon icon-mail"></span>CONTACTO</a></div>
						</div>

					</div>
				</div>
			);
		}
	}

} export default Menu;
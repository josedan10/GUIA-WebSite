<?php 

	class Articulo {
	
		public $titulo;
		public $images = array();
		public $autor;
		public $fecha;
		public $categorias = array();
		public $contenido;

		function set_Articulo($titulo, $autor, $fecha, $categorias, $contenido){

			$this->titulo = $titulo;
			$this->autor= $autor;
			$this->fecha = $fecha;
			$this->categorias = $categorias;
			$this->contenido = $contenido;
		}

		function mostrarCategorias(){
			$categorias = '';

			foreach ($this->categorias as $categoria){
				$categorias = $categorias.' <a href="" />'.$categoria.'</a>';
			}

			return $categorias;
		}

		function construirArticulo(){
			echo "
			<article>

				<h2>$this->titulo</h2>
				<h3>$this->autor</h3>
				<div class='atributos-articulo'>
					<span class='icon icon-calendar'></span>$this->fecha
					<span class='icon icon-price-tag'></span>".$this->mostrarCategorias()."
				</div>
				<img src='imgArticule1.jpeg' alt=''>
				<div class='articulo'>$this->contenido</div>
			</article>
			";
		}
	}

?>
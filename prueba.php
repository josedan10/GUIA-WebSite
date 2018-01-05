<?php 

	//Conexión a BD

	$servername = "localhost";
	$username = "root";
	$password = "Zedstaphplis07.";
	$dbname = "guiabd";

	// Creamos la conexión
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Verificamos la conexión
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$Query = "SELECT COUNT(Titulo) AS TOTAL FROM articulo;";
	$resultado = $conn->query($Query);

	$row = $resultado->fetch_assoc();

	$TOTAL = $row["TOTAL"];
	echo "El total es: $TOTAL\n";

	$queryArt = "SELECT * FROM articulo ORDER BY Fecha DESC;";
	$resultadoArticulos = $conn->query($queryArt);
	
	for($i = 0; $i < 10; $i++) {
		$row = $resultadoArticulos->fetch_assoc();
        echo "Titulo: " . $row["Titulo"]."\n";
    }

	// foreach($arrayArt as $articulo){

	// 	echo "$articulo";
	// 	// echo "<article>
	// 	// 	<h2>".$articulo["Titulo"]."</h2>
	// 	// 	<div class='atributos-articulo'>
	// 	// 		<span class='icon icon-calendar'></span>".$articulo["Fecha"]."
	// 	// 		<span class='icon icon-price-tag'></span>Sin categoria
	// 	// 	</div>
			
	// 	// 	<img src='articulo1/imgArticule1.jpeg' alt='' />
	// 	// 	<div class='articulo'>".$articulo["Contenido"]."</div>
			
	// 	// </article>";
	// }


?>
<?php 

	//iniciando la conexión.
	$conexion = new mysqli('localhost', 'root', '', 'psicosmart');
	if($conexion->connect_errno){ //llamada a la función connect_errno por si hay error
		echo 'fallo la conexión '. $conexión->connect_errno;
	}

	// mysqli_set_charset($conexion, 'utf8'); Forma procedimental
	$conexion->set_charset('utf8'); //Forma POO para identificar carácteres latinos

	$sql='SELECT * FROM users'; //haciendo la consulta 'SELECCIONA *TODO DESDE nombreTabla'


	// $resultados = mysqli_query($conexion, $sql); Forma procedimental
	$resultados=$conexion->query($sql); //Forma POO
	if($conexion->errno){
		die($conexion->error);
	}

	//while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){} Forma procedimental
	while($fila=$resultados->fetch_assoc()){ //Forma POO
		var_dump($fila);
	}
	
	// fetch_array() devolverá resultados indicando la posición, imprimos $fila[1];

	$conexion->close();

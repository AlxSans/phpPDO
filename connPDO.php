<?php 


try{
//variable = nueva instancia de la clase PDO (conexion a mysql);
	$bd = new PDO ('mysql:host=localhost;dbname=psicosmart', 'root', ''); //constructor
	echo 'Conexion OK';
  
}catch(Exception $e){//el catch 
	//En POO cuando ocurre un fallo es una excepción.
	die('Error: '. $e->GetMessage());
  
}finally{ //Aunque se haya ejecutado el try o el catch, de todas formas realiza esta acción
	$base=null;
}

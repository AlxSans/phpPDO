<?php 

$email = $_POST['email'];

try{
//variable = nueva instancia de la clase PDO (conexion a mysql);
	$bd = new PDO ('mysql:host=localhost;dbname=psicosmart', 'root', ''); //constructor
	// echo 'Conexion OK';
	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Generando objeto error
	$bd->exec('SET CHARACTER SET utf8');//usa carácteres latinos	 //uso de marcadores ":n"
	$sql='DELETE FROM users WHERE email=:n_email';//instrucción SQL.
	$resultado = $bd->prepare($sql);//el objeto que devuelve prepare se almacena en la variable $resultado
	$resultado->execute(array(
		
		":n_email"=>$email
	

	));//la variable resultado es un objeto PDOstatment

	echo 'resgistro eliminado';


	$resultado->closeCursor();

}catch(Exception $e){//el catch 
	//En POO cuando ocurre un fallo es una excepción.
	die('Error: '. $e->GetMessage());
}finally{ //Aunque se haya ejecutado el try o el catch, de todas formas realiza esta acción
	$bd=null;
}


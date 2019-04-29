<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
try{
//variable = nueva instancia de la clase PDO (conexion a mysql);
	$bd = new PDO ('mysql:host=localhost;dbname=psicosmart', 'root', ''); //constructor
	// echo 'Conexion OK';
	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Generando objeto error
	$bd->exec('SET CHARACTER SET utf8');//usa carácteres latinos	 //uso de marcadores ":n"
	$sql=('INSERT INTO users (name, email, password) VALUES (:n_name, :n_email, :n_password) ');//instrucción SQL.
	$resultado = $bd->prepare($sql);//el objeto que devuelve prepare se almacena en la variable $resultado
	$resultado->execute(array(
		":n_name"=>$name,
		":n_email"=>$email, 
		":n_password"=>$password

	));//la variable resultado es un objeto PDOstatment

	echo 'resgistro insertado';


	$resultado->closeCursor();

}catch(Exception $e){//el catch 
	//En POO cuando ocurre un fallo es una excepción.
	die('Error: '. $e->GetMessage());
}finally{ //Aunque se haya ejecutado el try o el catch, de todas formas realiza esta acción
	$bd=null;
}



 ?>

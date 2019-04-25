<?php 
$search = $_POST['busqueda'];
try{
//variable = nueva instancia de la clase PDO (conexion a mysql);
	$bd = new PDO ('mysql:host=localhost;dbname=psicosmart', 'root', ''); //constructor
	// echo 'Conexion OK';

	$bd->exec('SET CHARACTER SET utf8');//usa carácteres latinos
	$sql=('SELECT id, name, email, password FROM users WHERE email = ?');//instrucción SQL.
	$resultado = $bd->prepare($sql);//el objeto que devuelve prepare se almacena en la variable $resultado
	$resultado->execute(array($search));//la variable resultado es un objeto PDOstatment

	while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
		echo 'Nombre del usuario: '.$registro['name'];
	}

	$resultado->closeCursor();

}catch(Exception $e){//el catch 
	//En POO cuando ocurre un fallo es una excepción.
	die('Error: '. $e->GetMessage());
}finally{ //Aunque se haya ejecutado el try o el catch, de todas formas realiza esta acción
	$bd=null;
}



 ?>

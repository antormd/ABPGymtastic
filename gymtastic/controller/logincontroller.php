<?php
//incluimos las funciones de conexion para tener la conexion a la bd
include '../model/ConexionBD.php';
//Recogemos las variables que vienen por POST desde el formulario
$username= $_POST['username'];
$pass= $_POST['password'];
//Conectar con la bd
$db = new ConexionBD();
$AlreadyExistLogin = 'SELECT * FROM usuario WHERE username = \''. $username . '\'';
$ResultLogin = $db->consulta($AlreadyExistLogin) or die('No se puede comprobar si existe login');
	if (mysqli_num_rows($ResultLogin)==1)
	{
	$LoginQuery = mysqli_fetch_array($ResultLogin);

	if ($LoginQuery['password'] == $pass)
	{
		session_start();
		$_SESSION["username"] = $username;
		$_SESSION["tipo"] = $LoginQuery['tipo'];
		 
		if ($LoginQuery['tipo'] == 0){
		header('Location:../view/principaladmin.php');
		}else{
		header('Location:../view/recordarpass.php');	
		}

	}
	else
		{
			echo 'Error, contraseña no corresponde con el nombre de usuario';
			header('Location:../view/login.php');
		} 
	}
	else
	{
	echo 'Error, no existe ese nombre de usuario';
	}
?>
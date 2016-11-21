<?php
class UsuarioController{
public static function login() {
		/*Comprobamos si nos pasan un Usuario por metodo POST*/
		if(!isset($_SESSION)) session_start();{
	    if (isset($_POST["username"]) && isset($_POST["password"])){
	    	if($_POST["username"] && $_POST["password"]){
	    		$usuario = Usuario::obtenerDatos($_POST["username"], $_POST["password"]);
				//User no existe
				if ($usuario==NULL) {
					ob_start();
  					header("refresh: 3; url = ../index.php");
					$errors = array();
					$errors["general"] = "Nombre de Usuario no valido.";
					echo $errors["general"];
					ob_end_flush();
				}else{
					$_SESSION["usuario"] = $usuario;
				// Si login correcto direcionamos a una vista
				if($usuario->getTipo()=='0'){
					header("Location:../view/principaladmin.php");
				}
				else{
					if($usuario->getTipo()==1){
						header("Location:../view/gejercicios.php");
					}else{
						header("Location:../view/recordarpass.php");
					}
				}
			  }
	      	}else{
	      		$error = array();
				$error= "Nombre de Usuario no valido";
				print_r($error);
	      	}
	    }
	}
	}
}
?>
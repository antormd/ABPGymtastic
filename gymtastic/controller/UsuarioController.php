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
	
	public static function getEntrenador($idUsuario){
				if(!isset($_SESSION)) session_start();
				$usuario = NULL;
				$usuario = Usuario::getData($idUsuario);
				if ($usuario == NULL){
					ob_start(); 
	  			
					header("refresh: 3; url = ../view/gentrenadores.php"); 
					
					$errors = array();
					
					$errors["general"] = "El entrenador no existe";
					echo $errors["general"]; 
					ob_end_flush();
				}else{
					return $usuario;
				}
			}
			
	public static function getAllEntrenadores(){
			$entrenadores = new Usuario();
			return $entrenadores->getEntrenadores();
		}
		
		public static function modificarEntrenador(){
		if(!isset($_SESSION)) session_start();
		if($_SESSION['usuario']->getTipo()=='0'){

			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$tipo = 1;
			$username = $_POST['username'];
			$fechaNac = $_POST['fechaNac'];
			$password = $_POST['password'];
			$idUsuario = $_POST['idUsuario'];
						if(Usuario::registerValid($username,$password)){
							Usuario::update($idUsuario,$nombre,$apellidos,$tipo,$username,$fechaNac,$password);	
							header("Location: ../view/gentrenadores.php"); 
							}else{
							ob_start(); 
							header("refresh: 3; url = ../view/modificarejercicio.php?id=$idUsuario");  
							$errors = array();
							$errors["general"] = "ERROR.El formulario no fue bien completado.";
							echo $errors["general"]; 
							ob_end_flush();
							}
						}
	}

		public static function crearEntrenador(){
				if(!isset($_SESSION)) session_start();
				if($_SESSION['usuario']->getTipo()=='0'){

				
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['apellidos'];
				$tipo = 1;
				$username = $_POST['username'];
				$fechaNac = $_POST['fechaNac'];
				$password = $_POST['password'];
				$idUsuario = $_POST['idUsuario'];
 
				//Comprobamos el tipo de la Imagen, SI es correcto, obtenemos los datos de la ruta y de la imagen
						if(!UsuarioMapper::exists($username)){
							//Comprobamos si los datosintroducidos son Correctos
							if(Usuario::registerValid($username,$password)){
								//Creamos el Ejercicio
								$usuario = new Usuario();
								$usuario->setNombre($nombre);
								$usuario->setApellidos($apellidos);
								$usuario->setTipo($tipo);
								$usuario->setUsername($username);
								$usuario->setPassword($password);
								$usuario->setFechaNac($fechaNac);
								print_r($usuario) ;
	  							$usuario->saveUsuario($usuario);
	  							
								header("Location: ../view/gentrenadores.php"); 
								
							}else{
								ob_start(); 
	  							
	  							header("Location: ../view/gentrenadores.php"); 
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
							}
						}else{
							ob_start(); 
	  						
	  						header("Location: ../view/gentrenadores.php"); 
							$errors = array();
							$errors["general"] = "ERROR.El usuario ya existe.";
							echo $errors["general"]; 
							ob_end_flush();
						}
					}
					
				
				}
				
				public static function eliminarEntrenador(){
				if(!isset($_SESSION)) session_start();
					if($_SESSION['usuario']->getTipo()=='0'){
							$idUsuario = $_POST['idUsuario'];
							$username = $_POST['username'];
							if(UsuarioMapper::exists($username)){
								
								Usuario::delete($idUsuario);
								header("Location: ../view/gentrenadores.php"); 
								} 
							}else{
								ob_start(); 
								header("refresh: 3; url = ../view/gentrenadores.php");  
								$errors = array();
								$errors["general"] = "ERROR.El entrenador no existe.";
								echo $errors["general"]; 
								ob_end_flush();
							}
					
			}
	
}
?>
<?php
	class EjercicioController{

		public static function getEjercicio($idEjercicio){
				if(!isset($_SESSION)) session_start();
				$ejercicio = NULL;
				$ejercicio = Ejercicio::getData($idEjercicio);
				if ($ejercicio == NULL){
					ob_start(); 
	  			
					header("refresh: 3; url = ../view/gejercicios.php"); 
					
					$errors = array();
					
					$errors["general"] = "El ejercicio no existe";
					echo $errors["general"]; 
					ob_end_flush();
				}else{
					return $ejercicio;
				}
			} // FIN GET EJERCICIO

		/*Obtenemos todos los EJERCICIOS*/
		public static function getAll(){
			$ejercicios = new Ejercicio();
			return $ejercicios->getEjercicios();
		}
	
public static function crearEjercicio(){
				if(!isset($_SESSION)) session_start();
				if($_SESSION['usuario']->getTipo()=='1'){

				
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];
				$tipo = $_POST['tipo'];
				$repeticiones = $_POST['repeticiones'];
				$carga = $_POST['carga'];
				$creadoPor = $_SESSION['usuario']->getIdUsuario();
				// Recibo los datos de la imagen
				$nombre_img = $_FILES['imagen']['name'];
				$tipe = $_FILES['imagen']['type'];
				$tamano = $_FILES['imagen']['size'];
 
				//Comprobamos el tipo de la Imagen, SI es correcto, obtenemos los datos de la ruta y de la imagen
				if($_FILES['imagen']['type']=="image/jpeg" || $_FILES['imagen']['type']=="image/png" || $_FILES['imagen']['type']=="image/jpg"){
						//Comprobamos si no existe el ejercicio para poder guardarlo
						if(!EjercicioMapper::exists($nombre)){
							//Comprobamos si los datosintroducidos son Correctos
							if(Ejercicio::registerValid($nombre,$descripcion,$tipo,$repeticiones)){
								//Creamos ruta donde guardamos la imagen y le damos nombre 
								$ruta = "../imag";
								$nombreArchivo = $_FILES['imagen']['name'];
								move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta."/".$nombreArchivo);
								//Creamos el Ejercicio
								$ejercicio = new Ejercicio();
								$ejercicio->setNombre($nombre);
								$ejercicio->setDescripcion($descripcion);
								$ejercicio->setTipo($tipo);
								$ejercicio->setRepeticiones($repeticiones);
								$ejercicio->setCarga($carga);
								$ejercicio->setImagen($nombreArchivo);
								$ejercicio->setCreadoPor($creadoPor);
								print_r($ejercicio) ;
	  							$ejercicio->saveEjercicio($ejercicio);
	  							
								header("Location: ../view/gejercicios.php"); 
								
							}else{
								ob_start(); 
	  							
	  							header("Location: ../view/gejercicios.php"); 
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
							}
						}else{
							ob_start(); 
	  						
	  						header("Location: ../view/gejercicios.php"); 
							$errors = array();
							$errors["general"] = "ERROR.El ejercicio ya existe.";
							echo $errors["general"]; 
							ob_end_flush();
						}
					}else{
						ob_start(); 

						header("Location: ../view/gejercicios.php"); 
	  					
						$errors = array();
						$errors["general"] = "ERROR. Formato de imagen no válido.";
						echo $errors["general"]; 
						ob_end_flush();
					}}
					
				
				}
			 //FIN CREAR EJERCICIO


			public static function eliminarEjercicio(){
				if(!isset($_SESSION)) session_start();
					if($_SESSION['usuario']->getTipo()=='1'){
							$idEjercicio = $_POST['idEjercicio'];
							$nombre = $_POST['nombre'];
							//Comprobamos si existe el ejercicio para poder borrarlo
							if(EjercicioMapper::exists($nombre)){
								//Llamamos a la funcion que elimina la relacion Ejercicio-Tabla
								Ejercicio::deleteEjercicioTabla($idEjercicio);
								//LLamamos a la funcion que elimina el Ejercicio
								Ejercicio::delete($idEjercicio);
								//Redireccionamos a vista dependiendo del Usuario que modifico el Ejercicio
								header("Location: ../view/gejercicios.php"); 
								} 
							}else{
								ob_start(); 
								header("refresh: 3; url = ../view/gejercicios.php");  
								$errors = array();
								$errors["general"] = "ERROR.El ejercicio no existe.";
								echo $errors["general"]; 
								ob_end_flush();
							}
					
			}//FIN BORRAR EJERCICIO
	}
?>
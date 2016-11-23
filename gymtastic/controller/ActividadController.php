<?php
	class ActividadController{

		
	public static function getAll(){
			$actividades = new Actividad();
			return $actividades->listar();
	}

	
	public static function getActividad($idActividad){
				if(!isset($_SESSION)) session_start();
				$actividad = NULL;
				$actividad = Actividad::getData($idActividad);
				if ($actividad == NULL){
					ob_start(); 
	  			
					header("refresh: 3; url = ../view/gactividades.php"); 
					
					$errors = array();
					
					$errors["general"] = "La actividad no existe";
					echo $errors["general"]; 
					ob_end_flush();
				}else{
					return $actividad;
				}
	} 
	

	public static function modificarActividad(){
		if(!isset($_SESSION)) session_start();
		if($_SESSION['usuario']->getTipo()=='0'){

				$idActividad= $_POST['idActividad'];
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];
				$aula = $_POST['aula'];
				$aforo = $_POST['aforo'];
				$plazasocupadas = $_POST['plazasocupadas'];
				$fechaact = $_POST['fecha'];
				$hora = $_POST['hora'];
				$creadaPor = $_SESSION['usuario']->getIdUsuario();
				// Recibo los datos de la imagen
				$nombre_img = $_FILES['imagen']['name'];
				$tipe = $_FILES['imagen']['type'];
				$tamano = $_FILES['imagen']['size'];
		//Comprobamos el tipo de la Imagen, SI es correcto, obtenemos los datos de la ruta y de la imagen
						if($_FILES['imagen']['type']=="image/jpeg" || $_FILES['imagen']['type']=="image/png" || $_FILES['imagen']['type']=="image/jpg"){
							//Comprobamos si los datosintroducidos son Correctos
							if(Actividad::registerValid($nombre,$descripcion,$aula)){
								//Creamos ruta donde guardamos la imagen yle damos nombre 
							    $ruta = "../imag";
								$nombreArchivo = $_FILES['imagen']['name'];
								move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta."/".$nombreArchivo);
								Actividad::update($idActividad,$nombre,$descripcion,$aula, $aforo, $plazasocupadas,$fechaact,$hora, $nombreArchivo);
								//Redireccionamos a vista
								
								header("Location: ../view/gactividades.php"); 
								}else{
								ob_start(); 
								header("refresh: 3; url = ../view/modificaractividad.php?id=$idActividad");  
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
							}
						}else{
							ob_start(); 
							header("refresh: 3; url = ../view/modificaractividad.php?id=$idActividad");  
							$errors = array();
							$errors["general"] = "ERROR. Formato de imagen no válido.";
							echo $errors["general"]; 
						  	ob_end_flush();
						}
	}
}

	public static function crearActividad(){
				if(!isset($_SESSION)) session_start();
				if($_SESSION['usuario']->getTipo()=='0'){

				
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];
				$aula = $_POST['aula'];
				$aforo = $_POST['aforo'];
				$plazasocupadas = $_POST['plazasocupadas'];
				$fechaact = $_POST['fechaact'];
				$hora = $_POST['hora'];
				$creadaPor = $_SESSION['usuario']->getIdUsuario();
				// Recibo los datos de la imagen
				$nombre_img = $_FILES['imagen']['name'];
				$tipe = $_FILES['imagen']['type'];
				$tamano = $_FILES['imagen']['size'];
 
				//Comprobamos el tipo de la Imagen, SI es correcto, obtenemos los datos de la ruta y de la imagen
				if($_FILES['imagen']['type']=="image/jpeg" || $_FILES['imagen']['type']=="image/png" || $_FILES['imagen']['type']=="image/jpg"){
						//Comprobamos si no existe el ejercicio para poder guardarlo
						if(!ActividadMapper::exists($nombre)){
							//Comprobamos si los datosintroducidos son Correctos
							if(Actividad::registerValid($nombre,$descripcion,$aula)){
								//Creamos ruta donde guardamos la imagen y le damos nombre 
								$ruta = "../imag";
								$nombreArchivo = $_FILES['imagen']['name'];
								move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta."/".$nombreArchivo);
								//Creamos el Ejercicio
								$actividad = new Actividad();
								$actividad->setNombre($nombre);
								$actividad->setDescripcion($descripcion);
								$actividad->setAula($aula);
								$actividad->setAforo($aforo);
								$actividad->setPlazasocupadas($plazasocupadas);
								$actividad->setFechaact($fechaact);
								$actividad->setHora($hora);
								$actividad->setImagen($nombreArchivo);
								$actividad->setCreadaPor($creadaPor);
	  							$actividad->saveActividad($actividad);
	  							
								header("Location: ../view/gactividades.php"); 
								
							}else{
								ob_start(); 
	  							
	  							header("Location: ../view/gactividades.php"); 
								$errors = array();
								$errors["general"] = "ERROR.El formulario no fue bien completado.";
								echo $errors["general"]; 
								ob_end_flush();
							}
						}else{
							ob_start(); 
	  						
	  						header("Location: ../view/gactividades.php"); 
							$errors = array();
							$errors["general"] = "ERROR.La actividad ya existe.";
							echo $errors["general"]; 
							ob_end_flush();
						}
					}else{
						ob_start(); 

						header("Location: ../view/gactividades.php"); 
	  					
						$errors = array();
						$errors["general"] = "ERROR. Formato de imagen no válido.";
						echo $errors["general"]; 
						ob_end_flush();
					}}
					
				
				}



			public static function eliminarActividad(){
				if(!isset($_SESSION)) session_start();
					if($_SESSION['usuario']->getTipo()=='0'){
							$idActividad = $_POST['idActividad'];
							$nombre = $_POST['nombre'];
							//Comprobamos si existe el ejercicio para poder borrarlo
							if(ActividadMapper::exists($nombre)){
								//Llamamos a la funcion que elimina la relacion Ejercicio-Tabla
								Actividad::deleteActividadDeportista($idActividad);
								//LLamamos a la funcion que elimina el Ejercicio
								Actividad::delete($idActividad);
								//Redireccionamos a vista dependiendo del Usuario que modifico el Ejercicio
								header("Location: ../view/gactividades.php"); 
								} 
							}else{
								ob_start(); 
								header("refresh: 3; url = ../view/gactividades.php");  
								$errors = array();
								$errors["general"] = "ERROR.La actividad no existe.";
								echo $errors["general"]; 
								ob_end_flush();
							}
					
			}
	}
	
	 
?>
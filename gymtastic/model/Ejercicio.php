<!--
======================================================================
Modelo de la tabla Ejercicio
======================================================================
-->

<?php
// file: model/Ejercicio.php
/**
 * Class Ejercicio
 * 
 * Representa un ejercicio en la web
 * 
 */
include_once "../conexion/ConexionBD.php";
include_once "EjercicioMapper.php";

class Ejercicio {
 
  private $idEjercicio;
  private $nombre;
  private $descripcion;
  private $tipo;
  private $repeticiones;
  private $carga;
  private $creadoPor;
  private $imagen;
  
  /*
    Constructor del Ejercicio
  */
  public function __construct($idEjercicio=NULL,$nombre=NULL, $descripcion=NULL, $tipo=NULL, $repeticiones=NULL, $carga=NULL, $creadoPor=NULL, $imagen=NULL) {
    $this->idEjercicio = $idEjercicio;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->tipo = $tipo; 
    $this->repeticiones = $repeticiones;
    $this->carga = $carga;  
    $this->creadoPor = $creadoPor; 
    $this->imagen = $imagen; 
  }
  
  // id ejercicio
  public function getIdEjercicio() {
    return $this->idEjercicio;
  }
  public function setIdEjercicio($idEjercicio) {
    $this->idEjercicio = $idEjercicio;
  }

  // nombre del ejercicio
  public function getNombre() {
    return $this->nombre;
  }  
       
  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  //descripcion  
  public function getDescripcion() {
    return $this->descripcion;
  }  
       
  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  //tipo
  public function getTipo() {
    return $this->tipo;
  }  
       
  public function setTipo($tipo) {
    $this->tipo = $tipo;
  }

  //repeticiones
  public function getRepeticiones() {
    return $this->repeticiones;
  }  
       
  public function setRepeticiones($repeticiones) {
    $this->repeticiones = $repeticiones;
  }

  //carga
  public function getCarga() {
    return $this->carga;
  }
  public function setCarga($carga) {
    $this->carga = $carga;
  } 

  //creadoPor
  public function getCreadoPor() {
    return $this->creadoPor;
  }
  public function setCreadoPor($creadoPor) {
    $this->creadoPor = $creadoPor;
  } 

  //imagen
  public function getImagen() {
    return $this->imagen;
  }
  public function setImagen($imagen) {
    $this->imagen = $imagen;
  } 

  //Obtener lista de jercicios
  public static function getEjercicios()
    {
        return $lista = EjercicioMapper::listar();
    }



  //Guardamos un Ejercicio en la BD
  public static function saveEjercicio($ejercicio){  
    return EjercicioMapper::saveEjercicio($ejercicio);
  }



  //Si existe ejercicio devuelve Objeto Ejercicio
  public static function getData($idEjercicio) {
    if ($idEjercicio) {
        if ($res = EjercicioMapper::isValidEjercicio($idEjercicio)) {
                return EjercicioMapper::findByIdEjercicio($idEjercicio);
        } else {
                echo "ERROR: El ejercicio seleccionado no existe.";
            }
        } else {
            return "ERROR, no existe el ejercicio seleccionado";
        }
  }
 


  //Comprobamos si se puede registrar el Ejercicio. Si se puede retornamos un TRUE  
 public static function registerValid($nombre,$descripcion,$tipo,$repeticiones){
      $error = array();
      if (strlen($nombre) < 4 || strlen($nombre) > 15) {
	     $error["nombre"] = "El nombre de Ejercicio debe tener entre 4 y 15 caracteres.";
      }
      if (strlen($descripcion) < 5 || strlen($descripcion) > 500) {
	     $error["descripcion"] = "La descripcion del Ejercicio debe tener entre 5 y 500 caracteres.";	
      }
      if (strlen($tipo) < 3 || strlen($tipo) > 45) {
       $error["tipo"] = "El tipo del ejercicio debe estar entre 3 y 45 caracteres."; 
      }
      if (strlen($repeticiones) < 1 || strlen($repeticiones) > 45) {
       $error["repeticiones"] = "La repeticion del Ejercicio debe tener entre 5 y 15 caracteres.";  
      }
      if (sizeof($error)>0){
	     echo "Los datos introducidos no son validos: ";
       print_r(array_values($error));
      }
      if (sizeof($error)==0){
       return true;
      }else{
        return true;
      }
      
  }


  public static function update($idEjercicio,$nombre,$descripcion,$tipo, $repeticiones, $carga, $imagen){
      EjercicioMapper::update($idEjercicio,$nombre,$descripcion,$tipo, $repeticiones, $carga, $imagen);
  } 


  public static function delete($idEjercicio){
      EjercicioMapper::delete($idEjercicio);
  }


  public static function deleteEjercicioTabla($idEjercicio){
      EjercicioMapper::deleteRelacion($idEjercicio);
  }

  public static function deleteEjercicioSesion($idEjercicio){
      EjercicioMapper::deleteRelacion2($idEjercicio);
  }
}
?>
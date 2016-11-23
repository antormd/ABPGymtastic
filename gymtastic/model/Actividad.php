<!--
======================================================================
Modelo de la tabla Actividad
======================================================================
-->

<?php
// file: model/Actividad.php
/**
 * Class Actividad
 * 
 * Representa una actividad en la web
 * 
 */
include_once "../conexion/ConexionBD.php";
include_once "ActividadMapper.php";

class Actividad {
 
  private $idActividad;
  private $nombre;
  private $descripcion;
  private $aula;
  private $aforo;
  private $plazasocupadas;
  private $fechaact;
  private $hora;
  private $creadaPor;
  private $imagen;

 
   // El constructor
 
  public function __construct($idActividad=NULL,$nombre=NULL,$descripcion=NULL, $aula=NULL, $aforo=NULL, $plazasocupadas=NULL,$fechaact=NULL,$hora=NULL,$creadaPor=NULL,$imagen=NULL) {
    $this->idActividad = $idActividad;
    $this->descripcion = $descripcion;
    $this->aula = $aula;
    $this->aforo = $aforo; 
    $this->plazasocupadas = $plazasocupadas; 
	  $this->nombre = $nombre;    
	  $this->fechaact = $fechaact;
    $this->hora = $hora; 
    $this->creadaPor = $creadaPor;  
    $this->imagen = $imagen;    
 

  }
  
  // id actividad
  public function getId() {
    return $this->idActividad;
  }

  // nombre
  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

   // creada por
  public function getCreadaPor() {
    return $this->creadaPor;
  }
  
  public function setCreadaPor($creadaPor) {
    $this->creadaPor = $creadaPor;
  } 
  // descripcion
  public function getDescripcion() {
    return $this->descripcion;
  }
  
  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }
  
  // aula
  public function getAula() {
    return $this->aula;
  }  
   
  public function setAula($aula) {
    $this->aula = $aula;
  }
  
  // aforo
  public function getAforo() {
    return $this->aforo;
  }
 
  public function setAforo($aforo) {
    $this->aforo = $aforo;
  }

  // plazasocupadas
  public function getPlazasocupadas() {
    return $this->plazasocupadas;
  }
 
  public function setPlazasocupadas($plazasocupadas) {
    $this->plazasocupadas = $plazasocupadas;
  }



  // Fechanac
  public function getFechaact() {
    return $this->fechaact;
  }
 
  public function setFechaact($fechaact) {
    $this->fechaact = $fechaact;
  }

  // Hora
  public function getHora() {
    return $this->hora;
  }
 
  public function setHora($hora) {
    $this->hora = $hora;
  }

  // Imagen
  public function getImagen() {
    return $this->imagen;
  }
 
  public function setImagen($imagen) {
    $this->imagen = $imagen;
  }

  public function listar(){
      return $lista = ActividadMapper::listar();
    }


  public static function saveActividad($actividad){  
    return ActividadMapper::saveActividad($actividad);
  }


  public static function getData($idActividad) {
    if ($idActividad) {
        if ($res = ActividadMapper::isValidActividad($idActividad)) {
                return ActividadMapper::findByIdActividad($idActividad);
        } else {
                echo "ERROR: La actividad seleccionada no existe.";
            }
        } else {
            return "ERROR, no existe la actividad seleccionada";
        }
  }
 

  
 public static function registerValid($nombre,$descripcion,$aula){
      $error = array();
      if (strlen($nombre) < 4 || strlen($nombre) > 15) {
       $error["nombre"] = "El nombre de Actividad debe tener entre 4 y 15 caracteres.";
      }
      if (strlen($descripcion) < 5 || strlen($descripcion) > 500) {
       $error["descripcion"] = "La descripcion de la Actividad debe tener entre 5 y 500 caracteres."; 
      }
      if (strlen($aula) < 3 || strlen($aula) > 10) {
       $error["tipo"] = "El tipo de la actividad debe estar entre 3 y 10 caracteres."; 
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


  public static function update($idActividad,$nombre,$descripcion,$aula, $aforo, $plazasocupadas,$fechaact,$hora, $imagen){
      ActividadMapper::update($idActividad,$nombre,$descripcion,$aula, $aforo, $plazasocupadas,$fechaact,$hora, $imagen);
  } 


  public static function delete($idActividad){
      ActividadMapper::delete($idActividad);
  }


  public static function deleteActividadDeportista($idActividad){
      ActividadMapper::deleteRelacion($idActividad);
  }
}
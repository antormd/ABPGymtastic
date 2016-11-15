<!--
======================================================================
Modelo de la tabla Usuario
======================================================================
-->

<?php
// file: model/Usuario.php
/**
 * Class Usuario
 * 
 * Representa un usuario en la web
 * 
 */
include '../model/ConexionBD.php';
class Actividad {
 
  private $descripcion;
  private $aula;
  private $aforo;
  private $plazasocupadas;
  private $nombre;
  private $fechaact;
  private $imagen;
  
 
   // El constructor
 
  public function __construct($descripcion=NULL, $aula=NULL, $aforo=NULL, $plazasocupadas=NULL,$nombre=NULL,$fechaact=NULL,$imagen=NULL) {
    $this->descripcion = $descripcion;
    $this->aula = $aula;
    $this->aforo = $aforo; 
    $this->plazasocupadas = $plazasocupadas; 
	  $this->nombre = $nombre;    
	  $this->fechaact = $fechaact;
    $this->imagen = $imagen;      

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

  // nombre
  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  // Fechanac
  public function getFechaact() {
    return $this->fechanac;
  }
 
  public function setFechaact($fechaact) {
    $this->fechaact = $fechaact;
  }

  // Imagen
  public function getImagen() {
    return $this->fechanac;
  }
 
  public function setImagen($imagen) {
    $this->imagen = $imagen;
  }

  public function listar(){
        $db = new ConexionBD();
        $sqlActividad = $db->consulta("SELECT * FROM actividad");
        $arrayActividad = array();
        while ($row_actividad = mysqli_fetch_assoc($sqlActividad))
            $arrayActividad[] = $row_actividad;
        $db->desconectar();
        return $arrayActividad;
    }
}
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
class Usuario {
 
  private $username;
  private $contraseña;
  private $nombre;
  private $apellidos;
  private $tipo;
  private $fechanac;
  
 
   // El constructor
 
  public function __construct($username=NULL, $contraseña=NULL, $nombre=NULL, $apellidos=NULL,$tipo=NULL,$fechanac=NULL) {
    $this->username = $username;
    $this->contraseña = $contraseña;
    $this->nombre = $nombre; 
    $this->apellidos = $apellidos; 
	  $this->tipo = $tipo;    
	  $this->fechanac = $fechanac;    

  }
  
  // Username
  public function getUsername() {
    return $this->username;
  }
  
  public function setUsername($username) {
    $this->username = $username;
  }
  
  // Contraseña
  public function getContraseña() {
    return $this->contraseña;
  }  
   
  public function setContraseña($contraseña) {
    $this->contraseña = $contraseña;
  }
  
  // Nombre
  public function getNombre() {
    return $this->nombre;
  }
 
  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  // Apellidos
  public function getApellidos() {
    return $this->apellidos;
  }
 
  public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
  }

  // Tipo
  public function getTipo() {
    return $this->tipo;
  }

  public function setTipo($nombre) {
    $this->nombre = $tipo;
  }

  // Fechanac
  public function getFechanac() {
    return $this->fechanac;
  }
 
  public function setFechanac($fechanac) {
    $this->fechanac = $fechanac;
  }
}
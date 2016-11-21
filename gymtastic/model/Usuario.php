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
 
  private $idUsuario;
  private $username;
  private $password;
  private $nombre;
  private $apellidos;
  private $tipo;
  private $fechaNac;
  
 
   // El constructor
 
  public function __construct($idUsuario=NULL,$username=NULL, $password=NULL, $nombre=NULL, $apellidos=NULL,$tipo=NULL,$fechaNac=NULL) {
    $this->idUsuario = $idUsuario;
    $this->username = $username;
    $this->password = $password;
    $this->nombre = $nombre; 
    $this->apellidos = $apellidos; 
	  $this->tipo = $tipo;    
	  $this->fechaNac = $fechaNac;    

  }
  
    // IdUsuario
  public function getIdUsuario() {
    return $this->idUsuario;
  }

  // Username
  public function getUsername() {
    return $this->username;
  }
  
  public function setUsername($username) {
    $this->username = $username;
  }
  
  // password
  public function getPassword() {
    return $this->password;
  }  
   
  public function setPassword($password) {
    $this->password = $password;
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
  public function getFechaNac() {
    return $this->fechanac;
  }
 
  public function setFechaNac($fechanac) {
    $this->fechanac = $fechanac;
  }

  //Comprobacion existe Usuario... Si existe usuario devuelve un Objeto Usuario
  public static function obtenerDatos($username, $password) {
    if ($username && $password) {
        if ($res = UsuarioMapper::esValidoUsuario($username, $password)) {
                return UsuarioMapper::findByUserName($username);
        } else {
                echo "ERROR: Usuario o contrase&ntildea incorrectos.";
            }
        } else {
            return "ERROR, no existe el Ususario";
        }
  }
}
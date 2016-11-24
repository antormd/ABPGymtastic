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
 
  public function __construct($idUsuario=NULL,$nombre=NULL, $apellidos=NULL, $tipo=NULL, $username=NULL,$fechaNac=NULL,$password=NULL) {
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

  public function setTipo($tipo) {
    $this->tipo = $tipo;
  }

  // Fechanac
  public function getFechaNac() {
    return $this->fechaNac;
  }
 
  public function setFechaNac($fechanac) {
    $this->fechaNac = $fechanac;
  }
  
  public static function getEntrenadores(){
	  return $lista = UsuarioMapper::listarEntrenadores();
  }
  
   public static function getData($idUsuario) {
    if ($idUsuario) {
        if ($res = UsuarioMapper::isValidUsuario($idUsuario)) {
                return UsuarioMapper::findByIdUsuario($idUsuario);
        } else {
                echo "ERROR: El usuario seleccionado no existe.";
            }
        } else {
            return "ERROR, no existe el usuario seleccionado";
        }
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
  
  public static function saveUsuario($usuario){  
    return UsuarioMapper::saveUsuario($usuario);
  }
  
   public static function registerValid($username,$password){
      $error = array();
      if (strlen($username) < 4 || strlen($username) > 15) {
	     $error["username"] = "El nombre de usuario debe tener entre 4 y 15 caracteres.";
      }
      if (strlen($password) < 5 || strlen($password) > 50) {
	     $error["password"] = "La contraseña debe tener entre 5 y 50 caracteres.";	
      }
      if (sizeof($error)==0){
       return true;
      }else{
        return true;
      }
      
  }
  
  public static function update($idUsuario,$nombre,$apellidos,$tipo, $username, $fechaNac, $password){
      UsuarioMapper::update($idUsuario,$nombre,$apellidos,$tipo, $username, $fechaNac, $password);
  }
  
   public static function delete($idUsuario){
      UsuarioMapper::delete($idUsuario);
  }



  
}
<?php
include_once "../conexion/ConexionBD.php";

class UsuarioMapper{

    /*Buscamos Usuario por su nombreUsusario*/
    public static function findByUserName($username)
    {
        $db = new ConexionBD();
        $consultaUsuario = "SELECT * FROM usuario WHERE username=\"$username\"";
        $resultado = $db->consulta($consultaUsuario) or die('Error al ejecutar la consulta de usuario');
        $busqueda = mysqli_num_rows($resultado);
        if ($busqueda > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $usuario= new Usuario($row['idUsuario'],$row['nombre'],$row['apellidos'],$row['tipo'],$row['username'],$row['fechaNac'],$row['password']);
            return $usuario;
        } else {
            return NULL;
        }
    }
  
   
     /*Mira si el Usuario es valido y devuelve true.*/
    public static function esValidoUsuario($username, $password) {
         $db = new ConexionBD();
        
        //Comprueba si ya existe ese usuario
        $consultaUsuario = "SELECT * FROM usuario WHERE username=\"$username\" AND password=\"$password\"";
        $resultado = $db->consulta($consultaUsuario) or die('Error al ejecutar la consulta de usuario');
        
        $busqueda = mysqli_num_rows($resultado);
        if( $busqueda > 0) {
            return true;
        }
	}
		
	 public static function update($idUsuario,$nombre,$apellidos,$tipo, $username, $fechaNac, $password)
    {
        $db = new ConexionBD();
        $resultado = "UPDATE usuario SET nombre=\"$nombre\", apellidos =\"$apellidos\", tipo =\"$tipo\", username= \"$username\",fechaNac=\"$fechaNac\",password=\"$password\"  WHERE idUsuario=\"$idUsuario\"";
        $db->consulta($resultado) or die('Error al crear el usuario');
        
        $db->desconectar();
        return true;
   
    
        
    }
	
	 public static function delete($idUsuario){
        $db = new ConexionBD();
        $resultado =  $db->consulta("DELETE FROM usuario WHERE idUsuario=\"$idUsuario\"");
        return $resultado;
    }
	
  
    public static function listarEntrenadores()
    {
        $db = new ConexionBD();
        $sqlEntrenador = $db->consulta("SELECT * FROM usuario WHERE tipo=1");
        $arrayEntrenador = array();
        while ($row_entrenador = mysqli_fetch_assoc($sqlEntrenador))
            $arrayEntrenador[] = $row_entrenador;
        $db->desconectar();
        return $arrayEntrenador;
    }
	
	  public static function exists($username) {
        $db = new ConexionBD();
        $sqlexiste = $db->consulta("SELECT * FROM usuario WHERE username=\"$username\"");
        $busqueda = mysqli_num_rows($sqlexiste);
        if( $busqueda > 0) {
            return true;
        }
    }
	
	public static function saveUsuario($usuario){  
        $db = new ConexionBD();

            
            $insertaUser = "INSERT INTO usuario (nombre,apellidos,tipo,username,fechaNac, password) VALUES ('";
            $insertaUser = $insertaUser.$usuario->getNombre()."','".$usuario->getApellidos()."','".$usuario->getTipo()."','".$usuario->getUsername()."','".$usuario->getFechaNac()."','".$usuario->getPassword()."')";
            $db->consulta($insertaUser) or die('Error al crear el usuario');
            return true;
   
        
        $db->desconectar();
    }
	
	  public static function findByIdUsuario($idUsuario){
        $db = new ConexionBD();
        $sqlfind = $db->consulta('SELECT * FROM usuario WHERE idUsuario ="'.$idUsuario.'"');
        if (mysqli_num_rows($sqlfind) > 0) {
            $row = mysqli_fetch_assoc($sqlfind);
            
            $usuario= new Usuario($row['idUsuario'],$row['nombre'],$row['apellidos'],$row['tipo'],$row['username'],$row['fechaNac'],$row['password']);
            return $usuario;
        } else {
            return NULL;
        }
    }
	
	public static function isValidUsuario($idUsuario) {
        $db = new ConexionBD();
        $sqlesvalido = $db->consulta("SELECT * FROM usuario WHERE idUsuario=\"$idUsuario\"");
        $busqueda = mysqli_num_rows($sqlesvalido);
        if( $busqueda > 0) {
            return true;
        }
    }
	

      
   
}

?>
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
            $usuario= new Usuario($row['idUsuario'],$row['username'],$row['password'],$row['nombre'],$row['apellidos'],$row['tipo'],$row['fechaNac']);
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
}
?>
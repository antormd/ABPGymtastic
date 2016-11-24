<?php

class ConexionBD {
    var $conexion;
    
    public function __construct($host="localhost",$user="root",
                                $pass="", $db="gymtastic"){
        $this->conexion = mysqli_connect($host, $user, $pass, $db);
        
        // Check connection
        if (mysqli_connect_errno()){
          echo "Fallo al conectar con la base de datos: " . mysqli_connect_error();
        }
    }
    
    public function consulta($sentencia){
        return mysqli_query($this->conexion,$sentencia);
    }
    
    public function desconectar(){
        $this->conexion->close();
    }
}
?>

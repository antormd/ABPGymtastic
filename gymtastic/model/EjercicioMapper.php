<?php
include_once "../conexion/ConexionBD.php";

class EjercicioMapper{


    public static function update($idEjercicio,$nombre,$descripcion,$tipo, $repeticiones, $carga)
    {
        global $connect;
        $resultado = mysqli_query($connect, "UPDATE ejercicio SET nombre=\"$nombre\", descripcion =\"$descripcion\", tipo =\"$tipo\", repeticiones= \"$repeticiones\",carga=\"$carga\" WHERE idEjercicio=\"$idEjercicio\"");
           return $resultado;
            
    }

    //Elimina de la base de datos segun la primary key pasada
    public static function delete($idEjercicio){
        $db = new ConexionBD();
        $resultado =  $db->consulta("DELETE FROM ejercicio WHERE idEjercicio=\"$idEjercicio\"");
        return $resultado;
    }

    //Borra la relacion del ejercicio que se pasa con las tablas de ejercicios
    public static function deleteRelacion($idEjercicio){
        global $connect;
        $resultado = mysqli_query($connect, "DELETE FROM ejercicio_tablaejercicios WHERE idEjercicio=\"$idEjercicio\"");
        return $resultado;
    }


    //Listar todos los Ejercicios   
    public static function listar()
    {
        $db = new ConexionBD();
        $sqlEjercico = $db->consulta("SELECT * FROM ejercicio");
        $arrayEjercicio = array();
        while ($row_ejercicio = mysqli_fetch_assoc($sqlEjercico))
            $arrayEjercicio[] = $row_ejercicio;
        $db->desconectar();
        return $arrayEjercicio;
    }

    //Comprobamos si existe un ejercicio por su nombre
    public static function exists($nombre) {
        $db = new ConexionBD();
        $sqlexiste = $db->consulta("SELECT * FROM ejercicio WHERE nombre=\"$nombre\"");
        $busqueda = mysqli_num_rows($sqlexiste);
        if( $busqueda > 0) {
            return true;
        }
    }

    //Guardamos un Ejercicio en la BD
    public static function saveEjercicio($ejercicio){  
        $db = new ConexionBD();

             //Inserta el Ejercicio en la tabla Ejercicio
            $insertaEjer = "INSERT INTO ejercicio (nombre,descripcion,tipo,repeticiones,carga, imagen, creadoPor) VALUES ('";
            $insertaEjer = $insertaEjer.$ejercicio->getNombre()."','".$ejercicio->getDescripcion()."','".$ejercicio->getTipo()."','".$ejercicio->getRepeticiones()."','".$ejercicio->getCarga()."','".$ejercicio->getImagen()."','".$ejercicio->getCreadoPor()."')";
            $db->consulta($insertaEjer) or die('Error al crear el ejercicio');
            return true;
   
        
        $db->desconectar();
    }
    
    
    //Cogemos todos los datos de un Ejercicio buscandolo por su ID y devolvemos un ejercicio Ejercicio
    public static function findByIdEjercicio($idEjercicio){
        $db = new ConexionBD();
        $sqlfind = $db->consulta('SELECT * FROM ejercicio WHERE idEjercicio ="'.$idEjercicio.'"');
        if (mysqli_num_rows($sqlfind) > 0) {
            $row = mysqli_fetch_assoc($sqlfind);
            
            $ejercicio= new Ejercicio($row['idEjercicio'],$row['nombre'],$row['descripcion'],$row['tipo'],$row['repeticiones'],$row['carga'],$row['creadoPor']);
            return $ejercicio;
        } else {
            return NULL;
        }
    }

    //Mira si el Ejercicio es valido y devuelve true.
    public static function isValidEjercicio($idEjercicio) {
        $db = new ConexionBD();
        $sqlesvalido = $db->consulta("SELECT * FROM ejercicio WHERE idEjercicio=\"$idEjercicio\"");
        $busqueda = mysqli_num_rows($sqlesvalido);
        if( $busqueda > 0) {
            return true;
        }
    }

    
}
?>
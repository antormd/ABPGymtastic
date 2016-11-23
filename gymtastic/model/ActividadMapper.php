<?php
include_once "../conexion/ConexionBD.php";

class ActividadMapper{


    public static function update($idActividad,$nombre,$descripcion,$aula, $aforo, $plazasocupadas,$fechaact,$hora, $imagen)
    {
        $db = new ConexionBD();
        $resultado = "UPDATE actividad SET nombre=\"$nombre\", descripcion =\"$descripcion\", aula =\"$aula\", aforo= \"$aforo\",plazasocupadas=\"$plazasocupadas\",fechaact=\"$fechaact\",hora=\"$hora\",imagen=\"$imagen\"  WHERE idActividad=\"$idActividad\"";
        $db->consulta($resultado) or die('Error al crear la actividad');
        
        $db->desconectar();
        return true;
   
    
        
    }

    public static function delete($idActividad){
        $db = new ConexionBD();
        $resultado =  $db->consulta("DELETE FROM actividad WHERE idActividad=\"$idActividad\"");
        return $resultado;
    }


    public static function deleteRelacion($idActividad){
        $db = new ConexionBD();
        $resultado = $db->consulta("DELETE FROM deportista_actividad WHERE idActividad=\"$idActividad\"");
        return $resultado;
    }

 
    public static function listar()
    {
        $db = new ConexionBD();
        $sqlActividad = $db->consulta("SELECT * FROM actividad");
        $arrayActividad = array();
        while ($row_actividad = mysqli_fetch_assoc($sqlActividad))
            $arrayActividad[] = $row_actividad;
        $db->desconectar();
        return $arrayActividad;
    }

    public static function exists($nombre) {
        $db = new ConexionBD();
        $sqlexiste = $db->consulta("SELECT * FROM actividad WHERE nombre=\"$nombre\"");
        $busqueda = mysqli_num_rows($sqlexiste);
        if( $busqueda > 0) {
            return true;
        }
    }


    public static function saveActividad($actividad){  
        $db = new ConexionBD();

            
            $insertaAct = "INSERT INTO actividad (nombre,descripcion,aula,aforo,plazasocupadas,fechaact,hora, imagen, creadaPor) VALUES ('";
            $insertaAct = $insertaAct.$actividad->getNombre()."','".$actividad->getDescripcion()."','".$actividad->getAula()."','".$actividad->getAforo()."','".$actividad->getPlazasocupadas()."','".$actividad->getFechaact()."','".$actividad->getHora()."','".$actividad->getImagen()."','".$actividad->getCreadaPor()."')";
            $db->consulta($insertaAct) or die('Error al crear la actividad');
            return true;
   
        
        $db->desconectar();
    }
    
    
    public static function findByIdActividad($idActividad){
        $db = new ConexionBD();
        $sqlfind = $db->consulta('SELECT * FROM actividad WHERE idActividad ="'.$idActividad.'"');
        if (mysqli_num_rows($sqlfind) > 0) {
            $row = mysqli_fetch_assoc($sqlfind);
            
            $actividad= new Actividad($row['idActividad'],$row['nombre'],$row['descripcion'],$row['aula'],$row['aforo'],$row['plazasOcupadas'],$row['fechaAct'],$row['hora'],$row['creadaPor'],$row['imagen']);
            return $actividad;
        } else {
            return NULL;
        }
    }


    public static function isValidActividad($idActividad) {
        $db = new ConexionBD();
        $sqlesvalido = $db->consulta("SELECT * FROM actividad WHERE idActividad=\"$idActividad\"");
        $busqueda = mysqli_num_rows($sqlesvalido);
        if( $busqueda > 0) {
            return true;
        }
    }

    
}
?>
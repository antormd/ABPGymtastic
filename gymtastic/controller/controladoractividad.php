<?php
    include_once "../model/Actividad.php";
    //Conectar con el modelo de Actividad
    $actividades = new Actividad();
    //Array asociativo de la tabla Actividad
    $arrayActividades = $actividades->listar();
?>
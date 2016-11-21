<?php
//Incluimos todos los controladores
	include_once('EjercicioController.php');
	include_once('UsuarioController.php');
	include_once('controladoractividad.php');
	include_once('logout.php');
//Incluir todos los modelos de nuestro sistema
	include_once('../model/ModeloGeneral.php');
//Llamamos alcontrolador y su accion
	if(isset($_GET["controlador"]) && isset($_GET["accion"])){
		$targetController = ucfirst($_GET["controlador"])."Controller";
		$action = $_GET["accion"];
		//Inicializamos la funcion del controlador
		$targetController::$action();
	}
	?>
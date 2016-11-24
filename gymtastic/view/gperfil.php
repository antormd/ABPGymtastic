<?php
include_once('../controller/PerfilController.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"]->getIdUsuario();
 $row = PerfilController::obtenerDatos($user);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/gestionarperfil.css"/>

</head>
<body>

	<!-- Barra de navegacion-->
  <nav style="top: 0px;" class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Gymtastic</a>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="indexdeportista.php">Inicio</a></li>
        <li><a href="gactividades.php">Actividades</a></li>
        <li><a href="gsesiones.php">Sesiones</a></li>
        <li><a href="#about">Perfil</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#about">Idioma</a></li>
      <li><a href="#contact">Salir</a></li>
    </ul>
  </div>
  </nav>

  <h2 align="center"><?php echo $row->getUsername() ?></h2>
  <hr>

  <!-- Datos deportista-->
  <div>
    <form id="formPerfil">
      <!-- Nombre Usuario-->
      <div class="form-group">
        <label> Nombre  </label>
        	<input name="nombre" class="form-control" readonly value="<?php echo $row->getNombre() ?>">
      </div>

			<div class="form-group">
				<label> Apellidos  </label>
				<input name="apellidos" class="form-control" readonly value="<?php echo $row->getApellidos() ?>">
			</div>

			 <div class="form-group">
         <label> Fecha nacimiento </label>
         <input name="fechaNac" class="form-control" readonly value="<?php echo $row->getFechaNac() ?>">
       </div>

      <!-- Contraseña-->
      <div class="form-group">
        <label> Password </label>
        <input name="password" class="form-control" readonly value="<?php echo $row->getPassword() ?>">
      </div>
      <br>
    </form>
    <div align="center ">
        <a href="modificarperfil.php" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar datos</a>
    </div>

    <hr>
  </div>
  </body>



</html>

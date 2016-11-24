<?php
include_once('../controller/defaultcontroller.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"]->getIdUsuario();
 $row =UsuarioController::getDatosUsuario($user);

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
        <li><a href="gperfil.php">Perfil</a></li>
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
    <form id="formPerfil"  action="../controller/defaultcontroller.php?controlador=usuario&accion=modificarUsuario" method="POST" enctype="multipart/form-data">
      <!-- Nombre Usuario-->
      <div class="form-group">
        <label> Nombre  </label>
        	<input type="text" required="" name="nombre" class="form-control"  placeholder="<?php echo $row->getNombre() ?>">
      </div>

			<div class="form-group">
				<label> Apellidos  </label>
				<input type="text" required="" name="apellidos" class="form-control"  placeholder="<?php echo $row->getApellidos() ?>">
			</div>

			 <div class="form-group">
         <label> Fecha nacimiento </label>
         <input type="text" required="" name="fechaNac" class="form-control"  placeholder="<?php echo $row->getFechaNac() ?>">
       </div>

      <!-- Contraseña-->
      <div class="form-group">
        <label> Password antigua </label>
        <input type="password" required="" name="passwordAntigua" class="form-control" readonly placeholder="<?php echo $row->getPassword() ?>">
      </div>

      <div class="form-group">
        <label> Nueva password </label>
        <input type="password" required="" name="password" type="password" class="form-control">
      </div>

      <div class="form-group">
        <label> Repite nueva password </label>
        <input type="password" required="" name="password2" type="password" class="form-control">
      </div>
      <br>

      <div align="center ">
          <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Confirmar</button>
          <a href="indexdeportista.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-pencil"></span> Cancelar</a>
      </div>
    </form>


    <hr>
  </div>
  </body>



</html>

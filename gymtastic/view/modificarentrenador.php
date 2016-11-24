<?php
include_once('../controller/defaultcontroller.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"];
 if ($_SESSION["usuario"]->getTipo() =='0'){

    $idUser = $_GET['id'];
    $usuario = UsuarioController::getEntrenador($idUser);




?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gymtastic</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/modificarejercicio.css" />
    <link rel="stylesheet" type="text/css" href="../css/prueba1.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  </body>
  <div style="margin-left: 0px" class="container">
     
     <h1 style="margin-left: 50px; color: white">Modificar Entrenador: <?php echo $usuario->getUsername();?></h1>

     <div id="container-formulario">
     

       <!-- DIV FORMULARIO -->
	
     <div style="color: white" id="container">
        <form action="../controller/defaultcontroller.php?controlador=usuario&accion=modificarEntrenador" method="POST" style="margin:10px;" enctype="multipart/form-data">
        <!-- COMIENZO ROW 2-->  
        <div class="row"> 

          <!-- DIV DESCRIP EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="apeEntr">Apellidos entrenador: </label>
              <input class="form-control" required="" rows="4" name="apellidos" placeholder="<?php echo $usuario->getApellidos(); ?>" maxlength="500"></input>
          </div>

          <!-- DIV NOMBRE EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="nomEntr">Nombre entrenador: </label>
              <input type="text" required="" class="form-control" name="nombre" maxlength="30" placeholder="<?php echo $usuario->getNombre();?>">
          </div>
        
  
          <!-- DIV REPETICIONES -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="username">Nombre de usuario: </label>
              <input type="text" class="form-control" required="" name="username" maxlength="45" placeholder="<?php echo $usuario->getUsername(); ?>">
          </div>
          <!-- DIV CARGA -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="password">Contraseña: </label>
              <input type="password" min="0" required="" name="password" placeholder="<?php echo $usuario->getPassword(); ?>" class="form-control">
          </div>
          <!-- DIV IMAGEN-->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:30px;">
              <label for="fechaNacimiento">Fecha Nacimiento: </label>
              <input type="date"  required="" name="fechaNac">
          </div>
		  
		     <?php
	   print_r($usuario);
	   ?>
          
            
          </div> <!-- FIN ROW 2-->
          <input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario();?>">
          <p style="text-align:center">
           <button id="btModificar" type="submit" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>

          <a href="geentrenadores.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
      </div> <!-- FIN FORMULARIO EJERCICIOS -->
     </div>

  </div><!-- FIN CONTAINER -->
  </html>
<?php

}else{
        ob_start(); 
             if($_SESSION["usuario"]->getTipo()=='0'){
                  header("Location: ../view/principaladmin.php");  
             }else{
                header("Location: = /../../index.php"); 
             }
          }
          
        ob_end_flush();  

?>
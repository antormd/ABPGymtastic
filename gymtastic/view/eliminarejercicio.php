<?php
include_once('../controller/defaultcontroller.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"];
 if ($_SESSION["usuario"]->getTipo() =='1'){

    $idEjer = $_GET['id'];
    $ejercicio = EjercicioController::getEjercicio($idEjer);

    if ($_SESSION["usuario"]->getIdUsuario() == $ejercicio->getCreadoPor()){


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
    <link rel="stylesheet" type="text/css" href="../css/eliminarejercicio.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <h2 style="margin-left: 30px">¿Seguro de que quieres eliminar el siguiente ejercicio?</h2>

  


    <div class="container">
     
     <h1 style="margin-left: 20px">Ejercicio: <?php echo $ejercicio->getNombre();?></h1>

       <!-- DIV MUESTRA EJERCICIO -->
     <div id="container-ejercicios">

      <div class="row">
    
          <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4" id="imagen" style="margin-bottom: 20px;"><img src="../imag/ejercicio.png" style="max-width: 100%;max-height: 100%;"></div>
          <div style="padding-left: 30px; padding-top: 30px" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <pre style="background-color: transparent; border-color: white;color: white"><?php echo $ejercicio->getDescripcion(); ?>
          </pre>  

          </div>
          <div style="padding-left: 30px" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><p><b>Peso (Kg): <?php echo $ejercicio->getCarga(); ?></b></p></div>
          <div style="padding-left: 30px" class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><p><b>Repeticiones: <?php echo $ejercicio->getRepeticiones(); ?></b></p></div>
          <div style="padding-left: 30px" class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><p><b>Tipo: <?php echo $ejercicio->getTipo(); ?></b></p></div>
      </div><!-- FIN ROW -->

     </div> <!-- FIN CONTAINER EJERCICIOS -->
<div>
<form style="margin-left: 30px;" action="../controller/defaultcontroller.php?controlador=ejercicio&accion=eliminarEjercicio" method="POST">
<input type="hidden" name="idEjercicio" value="<?php echo $ejercicio->getIdEjercicio();?>">
<input type="hidden" name="nombre" value="<?php echo $ejercicio->getNombre();?>">
<button style="float: left;margin-bottom: 10px" href="#" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
</form>
<a href="gejercicios.php"><button style="float: left;margin-left: 30px;margin-bottom: 20px" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</button></a>
</div>
  </div><!-- FIN CONTAINER -->





  </body>

  </html>
  <?php
  }else{
    echo "UPS... No tienes permiso para eliminar un ejercicio que no has creado, volviendo a gestion de ejercicios...";
    ob_start();
    header("refresh: 3; url = ../view/gejercicios.php"); 
  }
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
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
     
     <h1 style="margin-left: 50px; color: white">Modificar Ejercicio: <?php echo $ejercicio->getNombre();?></h1>

     <div id="container-formulario">
     

       <!-- DIV FORMULARIO -->
     <div style="color: white" id="container">
        <form action="../controller/defaultcontroller.php?controlador=ejercicio&accion=modificarEjercicio" method="POST" style="margin:10px;" enctype="multipart/form-data">
        <!-- COMIENZO ROW 2-->  
        <div class="row"> 

          <!-- DIV IMAGEN -->
        <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4" id="imagen" style="margin-bottom: 20px;margin-top: 20px"><img src="../imag/ejercicio.png" style="max-width: 100%;max-height: 100%;"></div>


          <!-- DIV DESCRIP EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-8">
              <label for="descEjer">Descripci&oacuten Ejercicio: </label>
              <textarea class="form-control" required="" rows="4" name="descripcion" placeholder="<?php echo $ejercicio->getDescripcion(); ?>" maxlength="500"></textarea>
          </div>

          <!-- DIV NOMBRE EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="nomEjer">Nombre Ejercicio: </label>
              <input type="text" required="" class="form-control" name="nombre" maxlength="30" placeholder="<?php echo $ejercicio->getNombre();?>">
          </div>
        
          <!-- DIV TIPO EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="nomEjer">Tipo: </label>
              <input type="text" required="" class="form-control" name="tipo" maxlength="45" placeholder="<?php echo $ejercicio->getTipo(); ?>">
          </div> 
          <!-- DIV REPETICIONES -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Repeticiones">Repeticiones: </label>
              <input type="text" class="form-control" required="" name="repeticiones" maxlength="45" placeholder="<?php echo $ejercicio->getRepeticiones(); ?>">
          </div>
          <!-- DIV CARGA -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Carga">Peso: </label>
              <input type="number" min="0" required="" name="carga" placeholder="<?php echo $ejercicio->getCarga(); ?>" class="form-control">
          </div>
          <!-- DIV IMAGEN-->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:30px;">
              <label for="imgEjer">Remplazar Imagen: </label>
              <input type="file" required="" name="imagen">
          </div>
          
            
          </div> <!-- FIN ROW 2-->
          <input type="hidden" name="idEjercicio" value="<?php echo $ejercicio->getIdEjercicio();?>">
          <p style="text-align:center">
           <button id="btModificar" type="submit" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>

          <a href="gejercicios.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
      </div> <!-- FIN FORMULARIO EJERCICIOS -->
     </div>

  </div><!-- FIN CONTAINER -->
  </html>
<?php
  }else{
    echo "UPS... No tienes permiso para modificar un ejercicio que no has creado, volviendo a gestion de ejercicios...";
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
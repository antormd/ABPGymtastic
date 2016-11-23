<?php
include_once('../controller/defaultcontroller.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"];
 if ($_SESSION["usuario"]->getTipo() =='0'){

    $idAct = $_GET['id'];
    $actividad = ActividadController::getActividad($idAct);

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
     
     <h1 style="margin-left: 50px; color: white">Modificar Actividad: <?php echo $actividad->getNombre();?></h1>

     <div id="container-formulario">

       <!-- DIV FORMULARIO -->
     <div style="color: white" id="container">
        <form action="../controller/defaultcontroller.php?controlador=actividad&accion=modificarActividad" method="POST" style="margin:10px;" enctype="multipart/form-data">
        <!-- COMIENZO ROW 2-->  
        <div class="row"> 

          <!-- DIV IMAGEN -->
        <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4" id="imagen" style="margin-bottom: 20px;margin-top: 20px"><img src="../imag/<?php echo $actividad->getImagen()?>" style="max-width: 100%;max-height: 100%;"></div>


          <!-- DIV DESCRIP ACT -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-8">
              <label for="descAct">Descripci&oacuten Actividad: </label>
              <textarea class="form-control" required="" rows="4" name="descripcion" placeholder="<?php echo $actividad->getDescripcion(); ?>" maxlength="500"></textarea>
          </div>

          <!-- DIV NOMBRE ACT -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="Nombre">Nombre Actividad: </label>
              <input type="text" required="" class="form-control" name="nombre" maxlength="30" placeholder="<?php echo $actividad->getNombre();?>">
          </div>
        
          <!-- DIV AULA ACT -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="Aula">Aula: </label>
              <input type="text" required="" class="form-control" name="aula" maxlength="45" placeholder="<?php echo $actividad->getAula(); ?>">
          </div> 
          <!-- DIV AFORO -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Aforo">Aforo: </label>
              <input type="number" min="0"  required="" name="aforo" placeholder="<?php echo $actividad->getAforo(); ?>" class="form-control">
          </div>
          <!-- DIV PLAZAS OCUPADAS -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Plazas Ocupadas">Plazas Ocupadas: </label>
              <input type="number" min="0" required="" name="plazasocupadas" placeholder="<?php echo $actividad->getPlazasocupadas(); ?>" class="form-control">
          </div>
            <!-- DIV FECHA -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Fecha">Fecha: </label>
              <input type="date" required="" name="fecha" placeholder="<?php echo $actividad->getFechaact(); ?>" class="form-control">
          </div>
          <!-- DIV HORA -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Fecha">HORA: </label>
              <input type="time" required="" name="hora" placeholder="<?php echo $actividad->getHora(); ?>" class="form-control">
          </div>
          <!-- DIV IMAGEN-->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:30px;">
              <label for="imgEjer">Remplazar Imagen: </label>
              <input type="file" required="" name="imagen">
          </div>
          
            
          </div> <!-- FIN ROW 2-->
          <input type="hidden" name="idActividad" value="<?php echo $actividad->getId();?>">
          <p style="text-align:center">
           <button id="btModificar" type="submit" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>

          <a href="gactividades.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
      </div> <!-- FIN FORMULARIO EJERCICIOS -->
     </div>

  </div><!-- FIN CONTAINER -->
  </html>
<?php
}else{
        ob_start(); 
             if($_SESSION["usuario"]->getTipo()=='1'){
                  header("Location: ../view/gejercicios.php");  
             }else{
                header("Location: = /../../index.php"); 
             }
          }
          
        ob_end_flush();  

?>
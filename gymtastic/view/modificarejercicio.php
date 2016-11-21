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
  <div class="container">
     
     <h1>Modificar Ejercicio: <?php echo $ejercicio->getNombre();?></h1>

     <div id="container-formulario">
     

       <!-- DIV FORMULARIO -->
     <div id="container-formulario2" style="background:#0275d8; border: solid;border-radius:5px; border-color: black;">
        <form action="../controller/defaultcontroller.php?controlador=ejercicio&accion=modificarEjercicio" method="POST" style="margin:10px;" enctype="multipart/form-data">
        <!-- COMIENZO ROW 2-->  
        <div class="row"> 
          <!-- DIV NOMBRE EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="nomEjer">Nombre Ejercicio: </label>
              <input type="text" required="" class="form-control" name="NomEjercicio" maxlength="30" placeholder="<?php echo $ejercicio->getNombre();?>">
          </div>
          <!-- DIV DESCRIP EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-8">
              <label for="descEjer">Descripci&oacuten Ejercicio: </label>
              <textarea class="form-control" required="" rows="4" name="DescripEjerc" placeholder="<?php echo $ejercicio->getDescripcion(); ?>" maxlength="500"></textarea>
          </div>
          <!-- DIV TIPO EJER -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="nomEjer">Tipo: </label>
              <input type="text" required="" class="form-control" name="tipo" maxlength="45" placeholder="<?php echo $ejercicio->getTipo(); ?>">
          </div> 
          <!-- DIV REPETICIONES -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Repeticiones">Repeticiones: </label>
              <input type="text" class="form-control" required="" name="Repeticiones" maxlength="15" placeholder="<?php echo $ejercicio->getRepeticiones(); ?>">
          </div>
          <!-- DIV CARGA -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Carga">Peso: </label>
              <input type="number" min="0" required="" name="carga" placeholder="<?php echo $ejercicio->getCarga(); ?>" class="form-control">
          </div>
          <!-- DIV IMAGEN-->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4" style="margin-top:30px;">
              <label for="imgEjer">Subir Imagen: </label>
              <input type="file" required="" name="imagen">
          </div>
          
            
          </div> <!-- FIN ROW 2-->
          <input type="hidden" name="idEjercicio" value="<?php echo $ejercicio->getIdEjercicio();?>">
          <p style="text-align:center">
          <button type="submit" class="btn btn-default1" style="margin-right: 10px;">
            <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
          </button>

          <a href="gejercicios.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
      </div> <!-- FIN FORMULARIO EJERCICIOS -->
     </div>

  </div><!-- FIN CONTAINER -->
  <footer>
  <img id = "footer" src="../css/imagenes/footer.png" class="img-responsive" alt="Responsive image">
  <div style="margin-top: 20px">
    <p style= "text-align: center;">
      Área de Benestar, Saúde e Deporte da Universidade de Vigo | <a href="mailto:deportes@uvigo.es">
      deportes@uvigo.es
      </a>
      | Teléfono: 986 812 182 
      
    </p>
  </div>
  </footer>
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
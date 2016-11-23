<?php
include_once('../controller/defaultcontroller.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"];
 if ($_SESSION["usuario"]->getTipo() =='0'){
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
    <link rel="stylesheet" type="text/css" href="../css/crearactividad.css" />
    <link rel="stylesheet" type="text/css" href="../css/prueba1.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

 <!-- Barra de navegacion-->
  <nav style="top: 0px;" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
  <div class="navbar-header">
  <button style="margin-left: 5px" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>  
    <a class="navbar-brand" href='gejercicios.php'>Gymtastic</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <ul class="nav navbar-nav">
       <li><a href='principalentrenador.php'>Inicio</a></li>
        <li>
        <li><a href='gejercicios.php'>Volver a lista de actividades</a></li>
    </ul>
   <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Idioma <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Esp</a></li>
            <li><a href="#">Eng</a></li>
          </ul>
        </li>
        <li><a href='login.php'>Salir</a></li>

      </ul>
  </div>
  </div>
  </nav>


  <div class="container">
     
     <h1 style="color: white; margin-left: 50px;">Crear Actividad: </h1>

       <!-- DIV FORMULARIO -->
     <div id="container-ejercicios">
        <form action="../controller/defaultcontroller.php?controlador=actividad&accion=crearActividad" method='POST' style="margin:10px;" enctype="multipart/form-data">
        <!-- COMIENZO ROW-->  
        <div class="row"> 
          <!-- DIV NOMBRE ACT -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-4">
              <label for="nomEjer">Nombre Actividad: </label>
              <input type="text" class="form-control" name="nombre" maxlength="45" placeholder="Nombre actividad" required="">
          </div>
          <!-- DIV DESCRIP ACT -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-8">
              <label for="descrip">Descripci&oacuten Actividad: </label>
              <textarea class="form-control" name="descripcion" required="" rows="4" maxlength="500"></textarea>
          </div>
          <!-- DIV AULA -->
        
         <div style="margin-bottom: 15px" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Aula">Aula: </label>
              <input type="text" class="form-control" name="aula" maxlength="15" placeholder="Aula" required="">                            
         </div>
        
          <!-- DIV AFORO -->
          <div  class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Aforo">Aforo: </label>
              <input type="number" min="0" class="form-control" name="aforo">
          </div>
          <!-- DIV PLAZAS OCUPADAS -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <label for="Plazas">Plazas Ocupadas: </label>
              <input type="number" min="0" class="form-control" name="plazasocupadas">
          </div>
          <!-- DIV FECHA -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <label for="Fecha">Fecha Actividad: </label>
          <input type="date" name="fechaact">
          </div>
          <!-- DIV HORA -->
          <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <label for="Hora">Hora: </label>
          <input type="time" name="hora">
          </div>
          <!-- DIV IMAGEN-->
          <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-8" style="margin-top:30px;">
              <label for="imgEjer">Subir Imagen: </label>
              <input type="file" required="" name="imagen">
          </div>

            
          </div> <!-- FIN ROW -->

          <p style="text-align:center">
          <button id="btCrear" type="submit" style="margin-right: 10px;" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear</button>

          <a href="gactividadess.php"><button type="button" class="btn btn-default2">Atr&aacutes</button></a></p>
        </form>
     </div> <!-- FIN FORMULARIO EJERCICIOS -->

    </div>





  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  
  </body>
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
        ob_start(); 
             if($_SESSION["usuario"]->getTipo()=='1'){
                  header("Location: ../view/gejercicios.php");  
             }else{
                header("Location: = /../../index.php"); 
             }
          }
          
        ob_end_flush();  

?>
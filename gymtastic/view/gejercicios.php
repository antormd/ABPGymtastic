
<?php
include_once('../controller/defaultcontroller.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"];
 if ($_SESSION["usuario"]->getTipo() =='1'){
  $row = EjercicioController::getAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gymtastic</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/gejercicios.css" />

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
    <a class="navbar-brand" href="#">Gymtastic</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <ul class="nav navbar-nav">
       <li><a href="#">Inicio</a></li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestión
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a href="#ejerividades">Gestionar ejerividades</a></li>
           <li><a href="#deportistas">Gestionar deportistas</a></li>
           <li><a href="#entrenadores">Gestionar entrenadores</a></li>
           <li><a href="#notificaciones">Gestionar notificaciones</a></li>
        </ul>
       </li>
        <li>
        <li><a href="#perfil">Perfil</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Idioma
        <span class="caret"></span></a>
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
     
     <h1>Ejercicios</h1>
     <!-- BOTON MOSTRAR EJERCICIOS CREAR EJERCICIOS ELIMINAR EJERCICIOS-->
     <div class="row" style="margin-top: 20px; margin-bottom: 10px;">
      <div class="btn-group col-xs-6 col-sm-3 col-md-3 col-lg-3" role="group" style="margin-top: 10px;">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-list" aria-hidden="true";></span>
        </button>
        <ul class="dropdown-menu">
          <li class="dropdown-header">Mostrar Ejercicios de:</li>
            <li><a href="gestionEjercicios.php">Todos</a></li>
            <li><a href="gestionEjerciciosFiltrado.php?filtrado=Brazos">Brazos</a></li>
            <li><a href="gestionEjerciciosFiltrado.php?filtrado=Espalda">Espalda</a></li>
            <li><a href="gestionEjerciciosFiltrado.php?filtrado=Pecho">Pecho</a></li>
            <li><a href="gestionEjerciciosFiltrado.php?filtrado=Piernas">Piernas</a></li>
        </ul>
       </div>

       <div class="btn-group col-xs-6 col-sm-3 col-md-3 col-lg-3" role="group" style="margin-top: 10px;">
        <a href="crearejercicio.php" style="text-decoration: none;"><button type="button" class="btn btn-default1" id="botonCrear">Crear Ejercicio</button></a>
       </div>

       </div><!-- FIN BOTONES -->

       <!-- DIV CONTENEDOR DE LOS EJERCICIOS -->
     <div id="container-ejercicios">

      <div class="row" style="margin-top: 20px;">
          <?php
          if($row!=null){ 
            foreach ($row as $ejer) {
          ?>
          <tr>
                            <td width='10%'> <?php echo $ejer['nombre'] ?> </td>
                            <td width='60%'> <?php echo $ejer['descripcion'] ?> </td>
                            <td width='10%'> <?php echo $ejer['tipo'] ?> </td>
                            <td width='5%'> <?php echo $ejer['repeticiones'] ?> </td>
                            <td width='5%'> <?php echo $ejer['carga'] ?> </td>
                            <td width='10%'>  <a href="modificarejercicio.php?id=<?php echo $ejer['idEjercicio']; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button></a></td>
                            <td width='10%'>   <a href="eliminarejercicio.php?id=<?php echo $ejer['idEjercicio']; ?>"><button  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button></a></td>
                          </tr>
                          <br>
          <?php
            }
          }
          ?>

      </div>
      <!--  PAGINACION NO VISIBLE XS -->
      <div id= "paginacion">
        <ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">»</a></li>
        </ul>
      </div>

     </div>

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
             if($_SESSION["usuario"]->getTipo()=='0'){
                  header("Location: ../view/principaladmin.php");  
             }else{
                header("Location: = /../../index.php"); 
             }
          }
          
        ob_end_flush();  

?>
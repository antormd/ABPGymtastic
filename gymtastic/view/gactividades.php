<?php
include_once('../controller/defaultcontroller.php');
include_once('../model/ModeloGeneral.php');

if(!isset($_SESSION)) session_start();
 $user=$_SESSION["usuario"];
 if ($_SESSION["usuario"]->getTipo() =='0'){
  $row = ActividadController::getAll();
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
    <link rel="stylesheet" type="text/css" href="../css/gactividades.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

 <!-- Barra de navegacion-->
  <nav style="top: 0px;margin-bottom: 0px" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
  <div class="navbar-header">
  <button style="margin-left: 5px" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>  
    <a class="navbar-brand" href='gactividades.php'>Gymtastic</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <ul class="nav navbar-nav">
       <li><a href='gactividades.php'>Inicio</a></li>
        <li>
        <li><a href='principaladmin.php'>Volver a menú</a></li>
    </ul>
   <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left">
          <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar actividad">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
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
     
     <div style="margin-bottom: 20px;margin-left: 30px" class="row">
     <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
     <h1 >Lista de Actividades:</h1>
     </div>
 
     <div class="row" style="margin-top: 20px; margin-bottom: 10px;">

       <div class="btn-group col-xs-6 col-sm-5 col-md-5 col-lg-5" role="group" style="margin-top: 10px;">
        <a href="crearactividad.php" style="text-decoration: none;"><img style="width: 300px;height: 150px;" src="../css/imagenes/add.png"> </a>
       </div>
       </div>

       </div><!-- FIN BOTONES -->

          <?php
          if($row!=null){ 
            foreach ($row as $act) {
          ?>
          <div id="fila">
          <tr>
                           <div style="margin-bottom: 20px;margin-left: 30px" class="row">
                          
                          <div id="imagen" class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                            <td><img style="width: 400px;height: 250px;" src="../imag/<?php echo $act['imagen'] ?>"> </td>
                          </div>
                          
                          <div style="margin-bottom: 5px" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'><strong>Nombre Actividad: </strong><?php echo $act['nombre'] ?> </td>
                          </div>
                          
                          <div style="margin-bottom: 5px" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'><strong>Aula: </strong><?php echo $act['aula'] ?> </td>
                          </div>
                          
                          <div style="margin-bottom: 15px" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'><strong>Fecha: </strong><?php echo $act['fechaAct'] ?> </td>
                          </div>   

                          <div style="margin-bottom: 15px" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'><strong>Hora: </strong><?php echo $act['hora'] ?> </td>
                          </div>                         
                          <!-- ROW BOTONES -->
                          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <td width='10%'>  <a href="modificaractividad.php?id=<?php echo $act['idActividad']; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button></a></td>
                            <td width='10%'>   <a href="eliminaractividad.php?id=<?php echo $act['idActividad']; ?>"><button  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button></a></td>
                          </div>

          </tr>

          <br>
          </div>
          <?php
            }
          }
          ?>

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
                  header("Location: ../view/gactcicios.php");  
             }else{
                header("Location: = /../../index.php"); 
             }
          }
          
        ob_end_flush();  

?>
<?php
include_once('../controller/controladoractividad.php');
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
  <nav style="top: 0px;" class="navbar navbar-default" role="navigation">
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
 <!--<div id = "mas">
  <img  id = "logo" src="../css/imagenes/actividad+.png">
  </div>-->


      <div id="tabla">
        <!-- Contenido -->
          <div id="content">
            <div class="inner">
              <!--INICIO SECCIÓN-->
                  <h1 style="text-align: center;" id="actividades">Actividades</h1>
                    <br>
                      <table class="default">
                          <!-- Listar Actividades -->
                          <?php 
                          foreach ($arrayActividades as $act)  {
                          ?>
                          <tr>
                           
                            <td width='5%'> <?php echo $act['nombre'] ?> </td>
                            <td width='40%'> <?php echo $act['descripcion'] ?> </td>
                            <td width='5%'> <?php echo $act['aula'] ?> </td>
                            <td width='5%'> <?php echo $act['aforo'] ?> </td>
                            <td width='5%'> <?php echo $act['plazasOcupadas'] ?> </td>
                            <td width='10%'> <?php echo $act['fechaAct'] ?> </td>
                            <td width='10%'> <?php echo $act['hora'] ?> </td>
                            <td width='10%'> <button href="#" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Modificar</button></td>
                            <td width='10'>     <button href='eliminaractividad.php' class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></a></td>
                          </tr>
                          <?php
                          }
                          ?>
                        </table>
                    <!-- FIN TABLA -->
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

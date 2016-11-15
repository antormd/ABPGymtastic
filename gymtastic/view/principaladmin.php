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
    <link rel="stylesheet" type="text/css" href="../css/principaladmin.css" />

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
           <li><a href="#actividades">Gestionar actividades</a></li>
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

    <!-- Cuerpo-->
    <div id = "pagina" class="container">
    <a name = "perfil" href='gperfil.php'>
    <div id = "gperfil">
    </div>
    </a>

    <div style="margin-top: 50px;" id = "gestion">
    
    <a name = "deportistas" href='gdeportistas.php'>
      <div id = "gdeportistas" >
      </div>
    </a>

    <a name = "entrenadores" href='gentrenadores.php'>
    <div id = "gentrenadores">
    </div>
    </a>

    <a name = "actividades" href='gactividades.php'>
    <div id = "gactividades">
    </div>
    </a>

    <a name = "notificaciones" href='gnotificaciones.php'>
    <div id = "gnotificaciones">
    </div>
    </a>

    </div>
    </div>
    <!--
     <div class="container-fluid" style="padding-top: 20px" id = "pagina">
  <div class="row">

        <a name = "perfil"  href='gperfil.php'>
        <div class="col-md-3" id = "gperfil">
        </div>
        </a>

        <div style="margin-top: 50px;" id = "gestion">
        <a name = "deportistas" href='gdeportistas.php'>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id = "gdeportistas" >
        </div>
        </a>

        <a name = "entrenadores" href='gentrenadores.php'>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id = "gentrenadores">
        </div>
        </a>

        <a name = "actividades" href='gactividades.php'>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id = "gactividades">
        </div>
        </a>

        <a name = "notificaciones" href='gnotificaciones.php'>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id = "gnotificaciones">
        </div>
        </a>
        </div>

    </div>
    -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

  </body>
 <footer>
  <img id = "footer" src="../css/imagenes/footer.png" class="img-responsive" alt="Responsive image">
  <div style="margin-top: 20px">
    <p style= "text-align: center; color: black;">
      Área de Benestar, Saúde e Deporte da Universidade de Vigo | <a href="mailto:deportes@uvigo.es">
      deportes@uvigo.es
      </a>
      | Teléfono: 986 812 182 
      
    </p>
  </div>
  </footer>
  </html>
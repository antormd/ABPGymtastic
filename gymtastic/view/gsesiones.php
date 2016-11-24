<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/gestionarsesiones.css"/>

</head>
<body>

	<!-- Barra de navegacion-->
  <nav style="top: 0px;" class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Gymtastic</a>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="indexdeportista.php">Inicio</a></li>
				<li><a href="gactividades.php">Actividades</a></li>
        <li><a href="gsesiones.php">Sesiones</a></li>
        <li><a href="gperfil.php">Perfil</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#about">Idioma</a></li>
      <li><a href="#contact">Salir</a></li>
    </ul>
  </div>
  </nav>
	<br>
  <h2 align="center">Gestionar sesiones</h2>
  <hr>
	<br>
  <div id="tabla" class="table-responsive">
    <table class="table table-striped table-bordered" id="tablaSesion">
    <tr>
      <th>Sesion</th>
      <th>Dia</th>
    </tr>
    <tr>
      <td>Sesion 1 <a id="icon" href="monitorizarsesion.php" ><span class="glyphicon glyphicon-equalizer"></span></a></td>
      <td>20/2/2015</td>
    </tr>
    <tr>
      <td>Sesion 2 <a id="icon" href="monitorizarsesion.php" ><span class="glyphicon glyphicon-equalizer"></span></a></td>
      <td>21/2/2015</td>
    </tr>
    <tr>
      <td>Sesion 3 <a id="icon" href="monitorizarsesion.php" ><span class="glyphicon glyphicon-equalizer"></span></a></td>
      <td>22/2/2015</td>
    </tr>

    </table>

  </div>

  <hr>
  <footer>
  <img id = "footer" src="imagenes/footer.png" class="img-responsive" alt="Responsive image">
  <div style="margin-top: 20px">
    <p style= "text-align: center;">
      Área de Benestar, Saúde e Deporte da Universidade de Vigo | <a href="mailto:deportes@uvigo.es">
      deportes@uvigo.es
      </a>
      | Teléfono: 986 812 182

    </p>
  </div>
  </footer>
  </div>



</body>

</html>

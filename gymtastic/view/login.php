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
    <link rel="stylesheet" type="text/css" href="../css/login.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

 <!-- BARRA DE NAVEGACIÓN -->

  <nav class="navbar navbar-default" style="margin-bottom: 0px">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a style="color: white" class="navbar-brand" href="#">Gymtastic</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
         <li style="margin-left: 50px"><a id = "inicio" href="#principal">Inicio</a></li>
        <li style="margin-left: 50px"><a id = "donde" href="#mapa">¿Dónde puedes encontrarnos?</a></li>
	<li style="margin-left: 50px"><a id = "instalaciones" href="#carrusel">Instalaciones</a></li>
	</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- IMAGEN DEL LOGO Y TEXTO-->
	<div id = "principal">
	<a name="principal"></a>
	<div id = "imagentexto">
	<img id = "logo" src="../css/imagenes/logo.png">
    <h2 id = "Bienvenida">Bienvenido a Gymtastic</h2>
    <h3 id = "Saludo">Un gimnasio en el que encontrarás espacio para tus actividades favoritas.</h3>
<!-- BOTON QUE HABRE LOGIN-->

<!-- Button to open the modal login form -->
<button id = "login" onclick="document.getElementById('loginbutton').style.display='block'">Iniciar sesión</button>

<!-- The Modal -->
<div id="loginbutton" class="modal">
  <span onclick="document.getElementById('loginbutton').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="../controller/defaultcontroller.php?controlador=usuario&accion=login" method='POST'>
    <div class="imgcontainer">
      <img id = "avatar" src="../css/imagenes/avatar.png" class="img-responsive" alt="Responsive image">
    </div>

    <div style="width: 310px" class="container">
      <label style="margin-left:110px"><b>Usuario</b></label>
      <input style="margin-left: 40px" type="text" placeholder="Introduzca usuario" name="username" required>
    </div>

    <div style="width: 310px" class="container">
      <label style="margin-left:100px; margin-top:15px"><b>Contraseña</b></label>
      <input style="margin-left: 40px" type="password" placeholder="Introduzca contraseña" name="password" required>
	</div>

	<div style="width: 310px" class="container">
      <button id = "botonlogin" onclick="cifrar()" type="submit">Entrar</button>
      <input type="checkbox" checked="checked"> Recordarme
    </div>

    <div style="width: 310px" class="container">
    	<span class="psw">Olvidaste <a href='recordarpass.php'>la contraseña?</a></span>
    </div>
    <div style="width: 310px; margin-top:10px" class="container">
      	<button type="submit" onclick="document.getElementById('loginbutton').style.display='none'" class="cancelbtn">Volver</button>
    </div>
  </form>
</div>
</div>
</div>

<!-- Horario y Mapa con situacion -->
<div id = "mapa">
	<a name="mapa"></a>
	<div id = "horario">
	<h3 style="padding-top: 70px"><strong>Horario y Situación</strong><br /></h3>
</div>
<div id = "horario2">
	<h3>
	<strong> Septiembre a Junio</strong><br /><br />
	<strong> Lunes a Viernes: 8:30 a 23:30</strong><br />
	<strong> Sábados: 10:00 a 14:00 y 16:00 a 21:00</strong><br />
	<strong> Domingos: 10:00 a 14:00 y 16:00 a 20:00</strong>
	</h3>
</div>
<div id = "horario3">
	<h3>
	<strong> Julio, Semana Santa y Navidad</strong><br /><br />
	<strong> Lunes a Viernes: 9:00 a 21:00</strong><br />
	<strong> Sábados y Domingos: 10:00 a 14:00 y 16:00 a 21:00</strong>
	</h3>
</div>
<div id = "horario4">
	<h3>
	<strong> Agosto</strong><br /><br />
	<strong> Lunes a Viernes: 9:00 a 20:30</strong><br />
	<strong> Sábados y Domingos: Cerrado</strong>
	</h3>
</div>


<div style="text-align: center" id = "mapadiv">
<iframe style="border-width: medium;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d912.070313399573!2d-7.8516638980175335!3d42.342509201088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2ffebfc4e9e631%3A0x8a96205e37b805b4!2sPolideportivo+Universitario%2C+%E2%9B%89+Campus+As+Lagoas%2C+4.%C2%BA+piso%2C+32004+Orense%2C+Ourense!5e1!3m2!1ses!2ses!4v1478709501867" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>

<!-- INSTALACIONES -->
<div>
<a name="carrusel"></a>
<div id = "instalaciones">
	<h3 style="padding-top: 70px"><strong>Instalaciones</strong><br /></h3>
</div>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img style= "width: 100%" src="../css/imagenes/gimnasio1.jpg" alt="...">
      <div class="carousel-caption">
      	<h3>Instalaciones</h3>
      </div>
    </div>
    <div class="item">
      <img style= "width: 100%" src="../css/imagenes/gimnasio2.jpg" alt="...">
      <div class="carousel-caption">
      	<h3>Instalaciones</h3>
      </div>
    </div>
    <div class="item">
      <img style= "width: 100%" src="../css/imagenes/gimnasio3.jpg" alt="...">
      <div class="carousel-caption">
      	<h3>Instalaciones</h3>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
  <script>
        function cifrar(){
            var input_cont = document.getElementById("password");
            input_cont.value = hex_md5(input_cont.value);
        }
    </script>
  </body>
  <!-- FOOTER DE LA UVIGO -->
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

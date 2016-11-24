<?php
  include_once('../controller/defaultcontroller.php');
  include_once('../model/ModeloGeneral.php');

  if(!isset($_SESSION)) session_start();
  $user=$_SESSION["usuario"];
  print_r($user);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Recordar contraseña</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/recordarpass.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <h3>
  Si ha olvidado la contraseña acuda al gimnasio y consulte al adminitrador.
  </h3>
  <input type="button" value="Volver al login" name="B4" OnClick="location.href='login.php' ">
  </body>
  </html>
<?php
 
?>
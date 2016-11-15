	<?
		if(!isset($_SESSION)) session_start();
		session_unset();
		session_destroy();
		    
		// redireccionamos
		header("Location:../index.php");
		die();
		   	   
  ?>
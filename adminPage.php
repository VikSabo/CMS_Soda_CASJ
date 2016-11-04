<?php
   include_once('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="estilos/estilo_general.css">
</head>
<body>
	<div id="header">
	  <div class="shell">

	    <div id="top">
	      <p id="Fuente-h1">Administrador</p>
	      <div id="top-navigation"> Welcome <a href="#"><strong> <?php echo $login_session; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
	    </div>
	    
	    <div id="navigation">
	      <ul>
	        <li><a href="#" class="active"><span>Bandeja de Entrada</span></a></li>
	        <li><a href="create_menu.php"><span>Crear Nuevo Menu</span></a></li>
	        <li><a href="#"><span>Crear Nuevo Plato</span></a></li>
	        <li><a href="#"><span>Crear Nueva Bebida</span></a></li>
	      </ul>
	    </div>
	
	  </div>
	</div>


	<div id="container">
		
	</div>
</body>
</html>
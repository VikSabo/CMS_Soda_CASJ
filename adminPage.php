<?php
   include_once('session.php');
   include_once ('connection_db.php');

	$connection = db_connect();

	$sql = "SELECT * FROM cotizar";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>ID</th><th>NOMBRE</th><th>APELLIDO</th><th>TELÉFONO</th><th>EMAIL</th><th>PROVINCIA</th><th>DIRECCIÓN</th><th>FECHA (EVENTO)</th><th>NÚMERO DE PERSONAS</th><th>SERVICIO</th><th>INFORMACIÓN ADICIONAL</th></tr>';
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
	    }
	} else {
	    echo "0 results";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="estilos/estilo_general.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_adminPage.css">
</head>
<body>
	<div id="header">
	  <div class="shell">

	    <div id="top">
	      <div id="top-navigation"> Welcome <a href="#"><strong> <?php echo $login_session; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
	    </div>
	    
	    <div id="navigation">
	      <ul>
	        <li><a class="active" href="adminPage.php"><span>Bandeja de Entrada</span></a></li>
	        <li><a href="create_menu.php"><span>Crear Nuevo Menu</span></a></li>
	        <li><a href="crearPlato.php"><span>Crear Nuevo Plato</span></a></li>
	        <li><a href="crearBebida.php"><span>Crear Nueva Bebida</span></a></li>
	        <li><a href="ver_menu.php"><span>Ver información menú</span></a></li>
	        <li><a href="eliminar_Plato.php"><span>Eliminar Plato</span></a></li>
	        <li><a href="eliminar_Bebida.php"><span>Eliminar Bebida</span></a></li>
	      </ul>
	    </div>
	  </div>
	</div>


	<div id="container">
		<h1>Cotizaciones</h1>
	</div>
</body>
</html>
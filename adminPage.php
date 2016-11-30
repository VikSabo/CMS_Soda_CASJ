<?php
   include_once('session.php');
   include_once ('connection_db.php');

	$connection = db_connect();

	$sql = "SELECT `nombre_contacto`, `apellido_contacto`, `telefono_contacto`, `email_contacto`, `provincia`.`nombre_provincia`, `lugar_contacto`, `fecha_contacto`, `personas_contacto`, `servicio_contacto`, `extra_contacto` FROM `cotizar` INNER JOIN `provincia` ON `cotizar`.`id_provincia`=`provincia`.`id_provincia` WHERE `cotizar`.`estado_cotizar` = 'activo' ORDER BY `cotizar`.`fecha_contacto` ASC";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="hoverTable">';
		echo '<tr><th>NOMBRE</th><th>APELLIDO</th><th>TELÉFONO</th><th>EMAIL</th><th>PROVINCIA</th><th>DIRECCIÓN</th><th>FECHA (EVENTO)</th><th>NÚMERO DE PERSONAS</th><th>SERVICIO</th><th>INFORMACIÓN ADICIONAL</th><th>COTIZACIÓN</th></tr>';
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			?>
			<td align='center'><input type=submit value="Cotizar" style="width:100%" onClick="return popup(this, 'notes')"><?php
			echo '</tr>';
	    }
	} else {
	    echo "<div class='info'>No hay datos a mostrar</div>";
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
<SCRIPT TYPE="text/javascript">
  function popup(mylink, windowname) { 
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string') href=mylink;
    else href=mylink.href; 
    //window.open(href, windowname, 'width=400,height=200,scrollbars=yes'); 
    //window.open("http://localhost:8080/CMS_Soda_CASJ/enviar_email.php", "MsgWindow",'width=500,height=400,scrollbars=yes'); 
    window.open("http://localhost:8080/CMS_Soda_CASJ/enviar_email.php", "MsgWindow",'width=500,height=400,scrollbars=yes'); 
    return false; 
  }
</SCRIPT>
<body>
	<div id="header">
	  <div class="shell">

	    <div id="top">
	      <div id="top-navigation"> Welcome <a href="#"><strong> <?php echo $login_session; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="configuracion.php">Configuración</a> <span>|</span> <a href="logout.php">Log out</a> </div>
	    </div>
	    
	    <div id="navigation">
	      <ul>
	        <li><a class="active" href="adminPage.php"><span>Bandeja de Entrada</span></a></li>
	        <li><a href="create_menu.php"><span>Crear Nuevo Menu</span></a></li>
	        <li><a href="crearPlato.php"><span>Crear Nuevo Plato</span></a></li>
	        <li><a href="crearBebida.php"><span>Crear Nueva Bebida</span></a></li>
	        <li><a href="ver_menu.php"><span>Ver información menú</span></a></li>
	        <li><a href="eliminar_Plato.php"><span>Quitar Plato</span></a></li>
	        <li><a href="eliminar_Bebida.php"><span>Quitar Bebida</span></a></li>
	      </ul>
	    </div>
	  </div>
	</div>


	<div id="container">
	</div>
</body>
</html>
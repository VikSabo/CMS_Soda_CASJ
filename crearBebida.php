<?php
  include_once ('session.php');
  // Connect to the database
  $connection = db_connect();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Post variables
		$nombreBebida = $_POST['nombrebebida'];
		$descripcionBebida = $_POST['descripcionbebida'];
		$precioBebida = $_POST['preciobebida'];
		$miArchivo = $_POST['myFile'];
		$direccionTotal = 'bebidas_img/'.$miArchivo;
		
		//if($nombrePlato or $descripcionPlato or $precioPlato === null){
		//echo "Exiten campos en blanco, refrescar y agregar correctamente";
		//}
		
		
	$sql = "INSERT INTO `bebida`(`nombre_bebida`, `descripcion`, `precio`, `imagen`) VALUES ('$nombreBebida','$descripcionBebida','$precioBebida', '$direccionTotal')";

  
  	// Insert the data if the query its ok
		if ($connection->query($sql) === TRUE) {
		    echo "<div class='success'>Bebida agregada correctamente</div>";
		} else {
		    echo "Error: " . $sql . "<br>" . $connection->error;
		}

	}

   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="estilos/estilo_general.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_crearBebida.css">
</head>
<body>
	<div id="header">
	  <div class="shell">

	    <div id="top">
	      <div id="top-navigation"> Welcome <a href="#"><strong> <?php echo $login_session; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="configuracion.php">Configuración</a> <span>|</span> <a href="logout.php">Log out</a> </div>
	    </div>
	    
	    <div id="navigation">
	      <ul>
	       	<li><a href="adminPage.php"><span>Bandeja de Entrada</span></a></li>
	        <li><a href="create_menu.php"><span>Crear Nuevo Menu</span></a></li>
	        <li><a href="crearPlato.php"><span>Crear Nuevo Plato</span></a></li>
	        <li><a class="active" href="crearBebida.php"><span>Crear Nueva Bebida</span></a></li>
	        <li><a href="ver_menu.php"><span>Ver información menú</span></a></li>
	        <li><a href="eliminar_Plato.php"><span>Quitar Plato</span></a></li>
	        <li><a href="eliminar_Bebida.php"><span>Quitar Bebida</span></a></li>
	      </ul>
	    </div>
	
	  </div>
	</div>



<div id="container">
  <br>
  <br>
  <div align = "center">
  <section>
  <!-- meter lo del form -->
   <div id="container-menu" align="center">
    <form action="" method="post">
      <label for="lname">Ingrese el Nombre:</label>
      <br>
      <input type="text" id="nombrebebida" name="nombrebebida"><br>
	  <br>
	  <label for="lname">Descripción de la Bebida:</label>
	  <br>
	  <textarea name="descripcionbebida" id="descripcionbebida" style="font-family: fantasy;" rows="4" cols="27"></textarea>
	  <br>
	  <br>
	  <label for="lname">Ingrese el precio de la Bebida:</label>
	  <br>
      <input type="number" id="preciobebida" name="preciobebida"><br>
	  <br>
	  <input type="file" id="myFile" name="myFile">
	  <script>
		function myFunction() {
			var x = document.getElementById("myFile");
			x.disabled = true;
		}
	  </script>
	  <br>
	  <br>
	  <input type="submit" value="Agregar Bebida"/><br>
    </form>
	
  </div>
  
 </section>
 </div>
 </div>

 


</body>
</html>
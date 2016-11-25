<?php

  include_once ('session.php');
  // Connect to the database
  $connection = db_connect();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Post variables
		$nombrePlato = $_POST['nombreplato'];
		$descripcionPlato = $_POST['descripcionplato'];
		$precioPlato = $_POST['precioplato'];
		$miArchivo = $_POST['myFile'];
		$direccionTotal = 'platos_img/'.$miArchivo;
		
		//if($nombrePlato or $descripcionPlato or $precioPlato === null){
		//echo "Exiten campos en blanco, refrescar y agregar correctamente";
		//}
		
		
	$sql = "INSERT INTO `plato`(`nombre_plato`, `descripcion`, `precio`, `imagen`) VALUES ('$nombrePlato','$descripcionPlato','$precioPlato', '$direccionTotal')";

  
  	// Insert the data if the query its ok
		if ($connection->query($sql) === TRUE) {
		    echo "<div class='success'>Plato agregado correctamente</div>";
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
	<link rel="stylesheet" type="text/css" href="estilos/estilo_crearPlato.css">
</head>
<body>
	<div id="header">
	  <div class="shell">

	    <div id="top">
	      <div id="top-navigation"> Welcome <a href="#"><strong> <?php echo $login_session; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
	    </div>
	    
	    <div id="navigation">
	      <ul>
	        <li><a href="#"><span>Bandeja de Entrada</span></a></li>
	        <li><a href="create_menu.php"><span>Crear Nuevo Menu</span></a></li>
	        <li><a class="active" href="crearPlato.php"><span>Crear Nuevo Plato</span></a></li>
	        <li><a href="crearBebida.php"><span>Crear Nueva Bebida</span></a></li>
	        <li><a href="ver_informacion.php"><span>Ver Informacion</span></a></li>
	        <li><a href="eliminar_Plato.php"><span>Eliminar Plato</span></a></li>
	        <li><a href="eliminar_Bebida.php"><span>Eliminar Bebida</span></a></li>
	      </ul>
	    </div>
	
	  </div>
	</div>


	
<div id="container">
  <h1 align = "center">Formulario para Agregar una Comida Nueva</h1>
  <br>
  <br>
  <div align = "center">
  <section>
  <!-- meter lo del form -->
   <div class="formulario" align="center">
    <form action="" method="post">
      <label for="lname">Ingrese el Nombre:</label>
      <br>
      <input type="text" id="nombreplato" name="nombreplato"><br>
	  <br>
	  <label for="lname">Descripción del Platillo:</label>
	  <br>
	  <textarea name="descripcionplato" id="descripcionplato" style="font-family: fantasy;" rows="4" cols="27"></textarea>
	  <br>
	  <br>
	  <label for="lname">Ingrese el precio del Platillo:</label>
	  <br>
      <input type="number" id="precioplato" name="precioplato"><br>
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
	  <input type="submit" value="Agregar Plato"/><br>
    </form>
  </div>
 </section>
 </div>
 </div>
 

</body>
</html>
<?php
  include 'connection_db.php';
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
  <title>Crear Plato</title>
  <link rel="stylesheet" type="text/css" href="estilos/estilo_crearPlato.css">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="estilos/estilo_index.css"> 
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
</head>
<body>

  <br><br>

  
  <div align = "center">
  <section>
  <!-- meter lo del form -->
   <div class="formulario" align="center">
    <form action="" method="post">
      <label for="lname">Ingrese el nuevo Plato:</label>
      <input type="text" id="nombreplato" name="nombreplato"><br>
	  <br>
	  <label for="lname">Descripción del Platillo:</label>
      <input type="text" id="descripcionplato" name="descripcionplato"><br>
	  <br>
	  <label for="lname">Ingrese el precio del Platillo:</label>
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
 

<!-- código php para mandar el correo -->

</body>
</html>
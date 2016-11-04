<?php
  include 'connection_db.php';
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
  <title>Crear Bebida</title>
  <link rel="stylesheet" type="text/css" href="estilos/estilo_crearBebida.css">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="estilos/estilo_index.css"> 
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
</head>
<body>

  <br><br>

  <h1 align = "center">Formulario para Agregar una Bebida Nueva</h1>
  <br>
  <div align = "center">
  <section>
  <!-- meter lo del form -->
   <div class="formulario" align="center">
    <form action="" method="post">
      <label for="lname">Ingrese el nombre:</label>
      <input type="text" id="nombrebebida" name="nombrebebida"><br>
	  <br>
	  <label for="lname">Descripción de la bebida:</label>
      <input type="text" id="descripcionbebida" name="descripcionbebida"><br>
	  <br>
	  <label for="lname">Ingrese el precio de la Bebida:</label>
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
 


</body>
</html>
<?php 
	include 'connection_db.php';
	$connection = db_connect();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Post variables
		$selectOptionPlato = $_POST['idPlato'];
		$selectOptionBebida = $_POST['idBebida'];
		$date = date('Y-m-d', strtotime($_POST['fecha']));


		// Query to insert data
		$sql = "INSERT INTO `menu`(`id_plato`, `id_bebida`, `date`) VALUES ('$selectOptionPlato','$selectOptionBebida','$date')";

		// Insert the data if the query its ok
		if ($connection->query($sql) === TRUE) {
		    echo "<div class='success'>El Menú se ha creado correctamente</div>";
		} else {
		    echo "Error: " . $sql . "<br>" . $connection->error;
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Crear Menu</title>
	<link rel="stylesheet" type="text/css" href="estilos/estilo_create_menu.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_login.css">
</head>
<body>

	<div align="center">
		<div id="container">
			<form action="" method="post">
				<label>Seleccione un platillo</label><br>
				<select id="soflow" name="idPlato">
				  <?php 
				  	$sql = "SELECT * FROM plato";
				    $result = mysqli_query($connection,$sql);
				    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {                                                 
				       echo "<option value='".$row['id_plato']."'>".$row['nombre_plato']."</option>";
				    }
				  ?>
				</select><hr class="style4"><br>

				<label>Seleccione una bebida</label><br>
				<select id="soflow" name="idBebida">
				  <?php 
				  	$sql = "SELECT * FROM bebida";
				    $result = mysqli_query($connection,$sql);
				    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {                                                 
				       echo "<option value='".$row['id_bebida']."'>".$row['nombre_bebida']."</option>";
				    }
				  ?>
				</select><hr class="style4"><br>

				<label>Seleccione la fecha para el menú</label><br>
				<input type="date" name="fecha">

				<input type="submit" name="submit" value="Crear Menú">
			</form>
		</div>
	</div>
	
	
</body>
</html>
<?php 
	include_once ('session.php');
	include_once ('connection_db.php');

	$connection = db_connect();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Post variables
		$selectOptionPlato = $_POST['idPlato'];
		$selectOptionBebida = $_POST['idBebida'];
		$date = date('Y-m-d', strtotime($_POST['fecha']));


		// Query to insert data
		$sql = "INSERT INTO `menu`(`id_plato`, `id_bebida`, `date`) VALUES ('$selectOptionPlato','$selectOptionBebida','$date', 'r')";

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
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="estilos/estilo_create_menu.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_general.css">
</head>
<body>
	<div id="header">
	  <div class="shell">

	    <div id="top">
	      <h1><a href="#">Administrador</a></h1>
	      <div id="top-navigation"> Welcome <a href="#"><strong> <?php echo $login_session; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
	    </div>
	    
	    <div id="navigation">
	      <ul>
	        <li><a href="#"><span>Bandeja de Entrada</span></a></li>
	        <li><a href="#" class="active"><span>Crear Nuevo Menu</span></a></li>
	        <li><a href="crearPlato.php"><span>Crear Nuevo Plato</span></a></li>
	        <li><a href="crearBebida.php"><span>Crear Nueva Bebida</span></a></li>
	        
	      </ul>
	    </div>
	
	  </div>
	</div>

	<div id="container">
		<div align="center">
			<div id="container-menu">
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
	</div>

</body>
</html>
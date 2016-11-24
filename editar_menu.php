<?php
	include_once('session.php');
   	include_once ('connection_db.php');

	// creates the edit record form

	// since this form is used multiple times in this file, I have made it a function that is easily reusable
	function renderForm($id, $id_plato, $id_bebida, $date, $error) {

		$connection = db_connect();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Record</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="estilos/estilo_general.css">
		<link rel="stylesheet" type="text/css" href="estilos/estilo_ver_informacion.css">
	</head>

	<body>

		<div id="header">
		  <div class="shell">
		    <div id="top">
		      <div id="top-navigation"> Welcome <a href="#"></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
		    </div>
		    
		    <div id="navigation">
		      <ul>
		        <li><a href="adminPage.php" class="active"><span>Bandeja de Entrada</span></a></li>
		        <li><a href="create_menu.php"><span>Crear Nuevo Menu</span></a></li>
		        <li><a href="crearPlato.php"><span>Crear Nuevo Plato</span></a></li>
		        <li><a href="crearBebida.php"><span>Crear Nueva Bebida</span></a></li>
		        <li><a href="ver_informacion.php"><span>Crear Nueva Bebida</span></a></li>
		      </ul>
		    </div>
		  </div>
		</div>

		<?php

			// if there are any errors, display them
			if ($error != '') {
				echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
			}
		?>
		<h1>Editar Menú</h1>
		<div id="contenedor2">
			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				<div>
					<br/><br/>
					<label>Seleccione un platillo</label><br>
					<select id="soflow" name="id_plato">
					  <?php 
					  	$sql = "SELECT * FROM plato";
					    $result = mysqli_query($connection,$sql);
					    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {                                                 
					       echo "<option value='".$row['id_plato']."'>".$row['nombre_plato']."</option>";
					    }
					  ?>
					</select><br/>

					<label>Seleccione un platillo</label><br>
					<select id="soflow" name="id_bebida">
					  <?php 
					  	$sql = "SELECT * FROM bebida";
					    $result = mysqli_query($connection,$sql);
					    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {                                                 
					       echo "<option value='".$row['id_bebida']."'>".$row['nombre_bebida']."</option>";
					    }
					  ?>
					</select><br/>

	        		<label for="cname">Fecha</label><br/><br/>
	        		<input type="text" name="date" value="<?php echo $date; ?>"/><br/>
			        
					<input type="submit" class="button" name="submit" value="Modificar">
				</div>
			</form>
		</div>
	</body>
</html>

<?php

}
	// check if the form has been submitted. If it has, process the form and save it to the database
	if (isset($_POST['submit'])) {
		// confirm that the 'id' value is a valid integer before getting the form data
		if (is_numeric($_POST['id'])) {
			// get form data, making sure it is valid
			$id = $_POST['id'];

			$id_plato = mysql_real_escape_string(htmlspecialchars($_POST['id_plato']));

			$id_bebida = mysql_real_escape_string(htmlspecialchars($_POST['id_bebida']));

			$date = mysql_real_escape_string(htmlspecialchars($_POST['date']));

			// check that nombre_proyecto/id_curso fields are both filled in
			if ($id_plato == '' || $id_bebida == '') {
				// generate error message
				$error = 'ERROR: Por favor llene todos los campos!';

				//error, display form
				renderForm($id, $id_plato, $id_bebida, $date, $error);
			} else {
				// save the data to the database

				$sql = "UPDATE `menu` SET `id_plato`= '$id_plato',`id_bebida`= '$id_bebida',`date`= '$date' WHERE id_menu ='$id'";

				if ($connection->query($sql) === TRUE) {
				    echo "Record updated successfully";
				    // once saved, redirect back to the view page
					header("Location: ver_informacion.php");
				} else {
				    echo "Error updating record: " . $connection->error;
				}
			}
		} else {
			// if the 'id' isn't valid, display an error
			echo 'Error!';
		}
	} else {
		// if the form hasn't been submitted, get the data from the db and display the form

		// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

		if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
			// query db
			$id = $_GET['id'];
			$sql = "SELECT * FROM `menu` WHERE id_menu = '$id'";
          	$result = mysqli_query($connection, $sql);

			$row = mysqli_fetch_array($result);

			// check that the 'id' matches up with a row in the databse

			if($row) {
				// get data from db

				$id_plato = $row['id_plato'];

				$id_bebida = $row['id_bebida'];

				$date = $row['date'];
				
				// show form
				renderForm($id, $id_plato, $id_bebida, $date, '');
			} else {
				// if no match, display result
				echo "No existe resultados!";
			}
		} else {
			// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
			echo 'Error!';
		}
	}
?>
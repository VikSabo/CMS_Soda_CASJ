<?php
	include_once('session.php');
   	include_once ('connection_db.php');

   	$connection = db_connect();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Post variables
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$confirmPassword = mysqli_real_escape_string($connection, $_POST['confirm_password']);

		if ($password == $confirmPassword) {
			// Query to insert data
			$sql = "UPDATE `administrador` SET `nick`= '$username',`password`= '$password' WHERE id_admin = '1'";

			// Insert the data if the query its ok
			if ($connection->query($sql) === TRUE) {
			    echo "<div class='success'>La configuración se ha realizado correctamente</div>";
			} else {
			    echo "Error: " . $sql . "<br>" . $connection->error;
			}
		} else{
			echo "<div class='error'>No se pudo cambiar la contraseña debido a que no son iguales</div>";
		}			

	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_general.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_configuracion.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
        $("a.delete").click(function(e){
            if(!confirm('Estas seguro que desea eliminar esta información?')){
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
    </script>
  </head>
<body>
	
	<div id="header">
	  <div class="shell">
	    <div id="top">
	      <div id="top-navigation"> Welcome <a href="#"><strong> <?php echo $login_session; ?></strong></a> <span>|</span> <a href="#">Help</a> <span>|</span> <a href="#">Profile Settings</a> <span>|</span> <a href="logout.php">Log out</a> </div>
	    </div>
	    
	    <div id="navigation">
	      <ul>
	        <li><a href="adminPage.php"><span>Bandeja de Entrada</span></a></li>
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


	<div class='info'>Acá podrás cambiar el usuario y contraseña para ingresar al sistema</div>

	<div id="contenedor2">
		<br><br>
		<form action="" method="post">
		<label>Usuario :</label><br>
	    	<input name="username" id="username" type="text" /><br><br>


			<label>Contraseña :</label><br>
	    	<input name="password" id="password" type="password" /><br><br>
		
			<label>Confirmar Contraseña: </label><br>
	    	<input type="password" name="confirm_password" id="confirm_password"/><br>
	    	<span id='message'></span><br><br>
	    	<script type="text/javascript">
	    		$('#confirm_password').on('keyup', function () {
				    if ($(this).val() == $('#password').val()) {
				        $('#message').html('Contraseñas iguales').css('color', 'green');
				    } else $('#message').html('Contraseñas no son iguales').css('color', 'red');
				});
	    	</script>

	    	<input type="submit" name="submit" value="Cambiar">
		</form>
	</div>

</body>
</html>
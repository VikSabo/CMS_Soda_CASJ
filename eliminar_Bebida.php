<?php
	include_once('session.php');
   	include_once ('connection_db.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_general.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilo_ver_informacion.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
        $("a.delete").click(function(e){
            if(!confirm('Estas seguro que desea eliminar esta Bebida?')){
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
	        <li><a class="active" href="ver_menu.php"><span>Ver información menú</span></a></li>
	        <li><a href="eliminar_Plato.php"><span>Quitar Plato</span></a></li>
	        <li><a href="eliminar_Bebida.php"><span>Quitar Bebida</span></a></li>
	      </ul>
	    </div>
	  </div>
	</div>

	
	<!-- -->
	<?php
		$start=0;
		$limit=4;

		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$start=($id-1)*$limit;
		}
		else{
			$id=1;
		}
		//Fetch from database first 10 items which is its limit. For that when page open you can see first 10 items. 
		//$query = mysqli_query($connection,"SELECT m.id_menu, p.nombre_plato, b.nombre_bebida, m.date FROM menu m  INNER JOIN plato p ON m.id_plato = p.id_plato INNER JOIN bebida b ON m.id_bebida = b.id_bebida LIMIT $start, $limit");
		$query = mysqli_query($connection,"SELECT id_bebida, nombre_bebida, descripcion, precio FROM bebida");

	?>
	<table border='1' cellpadding='10'>
  		<tr>
          <th>ID</th>
          <th>Nombre Bebida</th>
          <th>Descripción de la Bebida</th> 
          <th>Precio de la Bebida</th>
          <th></th>
          <th></th>
        </tr>
	<?php
		//print 10 items
		while($result = mysqli_fetch_array($query))
		{
			echo "<tr>";

	        echo '<td>' . $result['id_bebida'] . '</td>';

	        echo '<td>' . $result['nombre_bebida'] . '</td>';

	        echo '<td>' . $result['descripcion'] . '</td>';

	        echo '<td>' . $result['precio'] . '</td>';

	        

	        echo '<td><a href="ElimBebida.php?id=' . $result['id_bebida'] . '" class="delete">Eliminar</a></td>';

	        echo "</tr>";
		}
	?>
	</table>
	<div class="pagination clearfix">
	<?php
		//fetch all the data from database.
		$rows = mysqli_num_rows(mysqli_query($connection,"select * from `bebida`"));
		//calculate total page number for the given table in the database 
		$total=ceil($rows/$limit);
		if($id>1)
		{
			//Go to previous page to show previous 10 items. If its in page 1 then it is inactive
			echo "<a href='?id=".($id-1)."'>Anterior</a>";
			//echo "<a href='?id=".($id-1)."' class='button'>Anterior</a>";
		}
		if($id!=$total)
		{
			////Go to previous page to show next 10 items.
			echo "<a href='?id=".($id+1)."'>Siguiente</a>";
			//echo "<a href='?id=".($id+1)."' class='button'>Siguiente</a>";
		}
	?>
	<?php
	//show all the page link with page number. When click on these numbers go to particular page. 
			for($i=1;$i<=$total;$i++)
			{
				if($i==$id) { 
					echo "<a href='#'>".$i."</a>"; 
				}
				else { 
					echo "<a href='?id=".$i."'>".$i."</a>"; 
				}
			}
	?>
	</div>
</div>
</body>
</html>
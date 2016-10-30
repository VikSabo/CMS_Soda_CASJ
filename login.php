<?php
  include 'connection_db.php';
  // Connect to the database
  $connection = db_connect();

  //Star a new session
  session_start();

  //Get and error flag
  $error = 0;

  //When user press the submit button
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //user name and password sent from form
    
    $myusername = mysqli_real_escape_string($connection, $_POST['username']);
    $mypassword = mysqli_real_escape_string($connection, $_POST['password']);

    //Fecth the user on the database
    $sql = "SELECT id_admin FROM administrador WHERE nick = '$myusername' AND password = '$mypassword'";

    $result = mysqli_query($connection,$sql);
    //Execute the query
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If the result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
      $_SESSION['login_user'] = $myusername;
      header("location: adminPage.php");
    } else {
      $error = 1;
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>M&M Soluciones</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="estilos/estilo_login.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
  <header>
    <div id="logo">
      <h1><img src="logo.png"></h1>
    </div>
    <div id="header-wrapper">
      <div id="menu">
      </div>
    </div>
  </header>
  <br><br>

  <div class="container">
    <section id="content">
      <?php 
        if ($error == 1) {
          echo "<div class='error'>El nombre de usuario o contraseña son incorrectos</div>";
        }
      ?>
      <form action="" method="post">
        <h1>Iniciar Sesión</h1>
        <div>
          <input type="text" placeholder="Nombre de usuario" required="" id="username" name="username" />
        </div>
        <div>
          <input type="password" placeholder="Contraseña" required="" id="password" name="password" />
        </div>
        <div>
          <input type="submit" value="Iniciar Sesión" />
          <a href="#">Recordar contraseña</a>
        </div>
      </form>
    </section>
  </div>

  <!--<footer id="footer">
    <div align="center">
      <label>Síguenos en:</label>
      <ul class="soc">
        <li><a class="soc-twitter" href="#"></a></li>
        <li><a class="soc-facebook" href="#"></a></li>
        <li><a class="soc-google" href="#"></a></li>
        <li><i class="fa fa-cc-mastercard" aria-hidden="true" style="font-size:48px;color:black"></i></li>
      </ul>
       &copy; Instituto Tecnológico de Costa Rica 2016
    </div>
  </footer>-->
 
</body>
</html>
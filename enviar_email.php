<?php
require 'PHPMailer/PHPMailerAutoload.php';


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Post variables
		$nombre = $_POST['name'];
		$email = $_POST['mail'];
		$comment = $_POST['comment'];

		if (array_key_exists('userfile', $_FILES)) {
			$uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name']));
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		  		$mail = new PHPMailer;
		  		$mail->CharSet = "UTF-8";

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'itcrprueba001@gmail.com';                 // SMTP username
				$mail->Password = 'holamundo';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->setFrom('from@example.com', 'Mailer');
				$mail->addAddress($email, $nombre);     // Add a recipient
				//$mail->addAddress('ellen@example.com');               // Name is optional
				//$mail->addReplyTo('info@example.com', 'Information');
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');

        		$mail->addAttachment($uploadfile, 'Cotizacion.pdf');
				//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Cotizacion - Evento M&M SOLUCIONES';
				$mail->Body    = $comment;
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
				    echo 'El correo fue enviado';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
				    echo 'Message has been sent';
				}
			} else {
				$msg .= 'Failed to move file to ' . $uploadfile;
			}
		}
	}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos/enviar_email.css">
</head>
<body>
		<form action="" method="post"  enctype="multipart/form-data">
		<div class="css-font-style">Nombre:</div>
		<input type="text" class="textbox" id="name" name="name"><br>
		<div class="css-font-style">E-mail:</div>
		<input type="email" class="textbox" id="mail" name="mail"><br>
		<div class="css-font-style">Comentario:</div>
		<input type="text" class="textbox" id="comment" name="comment" size="50"><br><br>
		<input type="hidden" name="MAX_FILE_SIZE" value="100000"> Adjuntar archivo: <input name="userfile" type="file" accept=".pdf"><br><br>
		<input type="submit" class="css_button" value="Enviar correo">		
		<input type="reset" class="css_button" value="Limpiar">
	</form>

</body>
</html>
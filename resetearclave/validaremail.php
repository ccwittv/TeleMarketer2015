<?php
    require '../clases/AccesoDatos.php';
    require '../clases/usuario.php';
    require '../clases/resetkey.php';
    require '../clases/phpmailer/PHPMailerAutoload.php';
    require '../clases/admintelem2015.php';
	
	function generarLinkTemporal($idusuario, $mail){

		$cadena = $idusuario.$mail.rand(1,9999999).date('Y-m-d');
		$token = sha1($cadena);
		
		//$conexion = new mysqli('localhost', 'root', '', 'ejemplobd');
		//$sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";
		//$resultado = $conexion->query($sql);
		$idinsertado = resetkey::InsertarReset($idusuario, $mail, $token, date("Y-m-d H:i:s"));
		$tokenbuscado = resetkey::TraerUnTokenId($idinsertado);
		
		if(isset($tokenbuscado->token)){
			if ($_SERVER['SERVER_NAME'] == 'localhost' or $_SERVER['SERVER_NAME'] == 'localhost:8080' )
				{
					$enlace = 'http://'.$_SERVER["SERVER_NAME"].'/TeleMarketer2015/resetearclave/restablecer.php?idusuario='.sha1($tokenbuscado->idusuario).'&token='.$tokenbuscado->token;
				}
			else
			    {
			    	$enlace = 'http://'.$_SERVER["SERVER_NAME"].'/resetearclave/restablecer.php?idusuario='.sha1($tokenbuscado->idusuario).'&token='.$tokenbuscado->token;
			    }		
			return $enlace;
		}
		else
			return FALSE;
	}

	function enviarEmail( $email, $link, $remitente){

		$correo = new PHPMailer();

		//$correo->SMTPDebug = 1;

		$correo->IsSendmail();
		$correo->IsSMTP();

		$correo->SMTPAuth = true;

		$correo->SMTPSecure = 'tls';
		$correo->Host = 'smtp.gmail.com';
		$correo->Port = 587;

		//$correo->SMTPSecure = 'ssl';
		//$correo->Host = 'smtp.gmail.com';
		//$correo->Port = 465;

		$correo->CharSet = 'UTF-8';
		$correo->Timeout=30;

		$correo->Username   = admintelem2015::TraerMailAdminTelem2015('webmaster');

		$correo->Password   = admintelem2015::TraerPassAdminTelem2015('webmaster');

		$correo->SetFrom( $correo->Username, 'Administrador Telemarketer2015');

		$correo->AddReplyTo( $correo->Username,'Administrador Telemarketer2015');

		$correo->AddAddress($email, $remitente->apellido.', '.$remitente->nombre);

		$correo->Subject = 'Recuperar contraseña';

// Esta condicion es necesaria porque si trabajo en el localhosts el link con un nombre que lo identifique
// no lleva	a la direccion cuando se le hace click. Es por eso  que cuando se trabaja en localhost
// hay que copiar y pegar la direccion que llega por correo en el navegador.
// Con la pagina de tuars no deberia pasar esto
		/*if ($_SERVER['SERVER_NAME'] == 'localhost' or $_SERVER['SERVER_NAME'] == 'localhost:8080' )
			{
				$correo->MsgHTML( '<html>
				<head>
		 			<title>Restablece tu contraseña</title>
				</head>
				<body>
		 			<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
		 			<p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
		 			<p>
		 				<strong>Enlace para restablecer tu contraseña</strong><br>
		 				'.$link.'
		 			</p>
				</body>
				</html>');
			}
		else
			{
				$correo->MsgHTML( '<html>
				<head>
		 			<title>Restablece tu contraseña</title>
				</head>
				<body>
		 			<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
		 			<p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
		 			<p>
		 				<strong>Enlace para restablecer tu contraseña</strong><br>
		 				<a href="'.$link.'"> Restablecer contraseña </a>
 					</p>
				</body>
				</html>');	
			}	*/


		$correo->MsgHTML( '<html>
				<head>
		 			<title>Restablece tu contraseña</title>
				</head>
				<body>
		 			<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
		 			<p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
		 			<p>
		 				<strong>Enlace para restablecer tu contraseña</strong><br>
		 				<a href="'.$link.'"> Restablecer contraseña </a>
 					</p>
				</body>
				</html>');	
				
        $correo->Send();
	}
	
	$email = $_POST['email'];
	$respuesta = new stdClass();

	if( $email != "" ){   
   		

        $usuarioBuscado = usuario::TraerUnUsuarioMail($email);

   		/*$conexion = new mysqli('localhost', 'root', '', 'ejemplobd');
   		$sql = " SELECT * FROM users WHERE email = '$email' ";
   		$r1esultado = $conexion->query($sql);*/

   		if(isset($usuarioBuscado->mail)) {
      		$idUsuario = $usuarioBuscado->id;
			$linkTemporal = generarLinkTemporal($idUsuario, $email);
      		if($linkTemporal){
        		enviarEmail( $email, $linkTemporal, $usuarioBuscado);
        		$respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
      		}
   		}
   		else
   			$respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
	}
	else
   		$respuesta->mensaje= "Debes introducir el email de la cuenta";
 	echo json_encode( $respuesta );
<?php

//require_once('phpmailer/class.phpmailer.php');
//require_once('phpmailer/class.smtp.php');
//require_once('phpmailer/PHPMailerAutoload.php');
require 'phpmailer/PHPMailerAutoload.php';
//OJO!!! POR FAVOR EN C:\xampp\php\PHP.INI AGREGAR  extension=php_openssl.dll
//tambien entrar a https://www.google.com/settings/security/lesssecureapps y en Acceso de aplicaciones menos seguras seleccionar Activar

$correo = new PHPMailer();

$correo->SMTPDebug = 1;

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

$correo->Username   = 'akrom1999@gmail.com';

$correo->Password   = 'metalo21';

$correo->SetFrom('akrom1999@gmail.com', 'Mi Codigo PHP');

$correo->AddReplyTo('akrom1999@gmail.com','Mi Codigo PHP');

$correo->AddAddress('ccwittv@yahoo.com.ar', 'Jorge');
//$correo->AddAddress('vanesacanepa@gmail.com', 'Vanesa');

$correo->Subject = 'Mi primero correo con PHPMailer';

$link = 'https://store.playstation.com/#!/en-us/all-ps3-games/cid=STORE-MSF77008-PS3ALLPS3GAMES';
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

//$correo->MsgHTML('<strong>Policia policia señorita!!!</strong>');

//$correo->AddAttachment('phpmailer/examples/images/phpmailer.png');

if(!$correo->Send()) {
  echo 'Hubo un error: ' . $correo->ErrorInfo;
  echo '<br>';
  echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded').'\n';
} else {
  echo 'Mensaje enviado con exito.';
}
echo "<br>";
var_dump($_SERVER);

?>
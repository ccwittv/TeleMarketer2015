<!--<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">-->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="denker">

    <title> Resetear contraseña </title>

    <!--<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">-->

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/ingreso.css" rel="stylesheet">
  
   <!-- main css -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/media-queries.css" rel="stylesheet" type="text/css">
    <link href="../css/ingreso.css" rel="stylesheet">
    <link href="../css/style_telemarketer2015.css" rel="stylesheet">

    <!-- media queries css -->
    <link rel="stylesheet" href="../bower_components/bootstrap-css/css/bootstrap.min.css">
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="icon" href="http://www.octavio.com.ar/favicon.ico">
        
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/funcionesAjax.js"></script>
    <script type="text/javascript" src="../js/funcionesLogin.js"></script>
    <script type="text/javascript" src="../js/funcionesABM.js"></script>
    <script type="text/javascript" src="../js/funcionesMapa.js"></script>

  </head>
<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>

	<body>
		<div id="container">
     <header id="header"> 
      <div id="formLogin" class="container">			
    		<form id="frmRegistro" class="form-ingreso" onsubmit="GuardarUsuario();return false;" style="margin: 0 auto">    
          <fieldset>
        		<legend>Registración de usuario</legend>
        		<p>Nombre<input class="form-control" name="nombre" type="text" maxlength="50" value="" id="nombre" required="" autofocus=""></p>
        		<p>Apellido<input class="form-control" name="apellido" type="text" maxlength="50" value="" id="apellido" required="" autofocus=""></p>
        		<!--<p>Legajo<input class="form-control" name="legajo" type="text" value="123123" id="legajo" ></p>
        		<p>Direccion<input class="form-control" name="dire" type="text" maxlength="50" value="lalala 1320" id="dire" ></p>-->
        		<p>E-mail (sera su nombre de usuario)<input class="form-control" name="email" type="email" value="" id="email" maxlength="50" required="" autofocus=""></p>
        		<!--<p>Fecha de nacimiento<input class="form-control" name="fecha" type="date" value="07 29 1999" id="fecha"></p>-->
        		<p>Clave<input class="form-control" name="pass" type="password" value="" id="pass" minlength="6" required="" autofocus=""></p>
        		<p>Confirmar Clave<input class="form-control" name="pass2" type="password" value="" id="pass2"  minlength="6" required="" autofocus=""></p>
            <br>
            <input type="text"  class="form-control" readonly id="MensajeError" >       
        		<!--<p>Foto<input class="form-control btn btn-info"  name="fichero" type="file" id="fichero"></p>
        		<span id="error" class='error1' style="display: none;"></span>
                <p>Preview</p><img  name="imagen" id="imagen" src="" alt="Imagen aqui" width="280" height="250">-->
            <p><input type="hidden" name="rol" id="rol" value="usuario" readonly></p>
            <p><input class="btn btn-primary" type="submit" value="Guardar Usuario" name="btnRegistro"></p>
            <p><input class="btn btn-success" onClick="location.href = '../index.php'" type="button" value="Volver al Login"></p>
    	    </fieldset>
    	   
    		</form>
       </div> 
     </header>    
		</div>
		</body >
  <?php }
  else
        { 
          echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
          <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
          <script type="text/javascript"> MostarBotones(); </script>
  <?php } ?>
    
        
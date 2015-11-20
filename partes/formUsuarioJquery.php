<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>

	<body style="zoom: 0.8;">
		<div class="CajaInicio animated bounceInRight">
			<h3>Registro de vendedor/usuario</h3>
			
    		<form id="frmRegistro" class="form-ingreso " onsubmit="GuardarUsuario();return false;">
    
            <fieldset>
        		<legend>Registro de vendedor/usuario</legend>
        		<p>Nombre<input class="form-control" name="nombre" type="text" maxlength="50" value="" id="nombre" required="" autofocus=""></p>
        		<p>Apellido<input class="form-control" name="apellido" type="text" maxlength="50" value="" id="apellido" required="" autofocus=""></p>
        		<!--<p>Legajo<input class="form-control" name="legajo" type="text" value="123123" id="legajo" ></p>
        		<p>Direccion<input class="form-control" name="dire" type="text" maxlength="50" value="lalala 1320" id="dire" ></p>-->
        		<p>E-mail (sera su nombre de usuario)<input class="form-control" name="email" type="text" value="" id="email" maxlength="50" required="" autofocus=""></p>
        		<!--<p>Fecha de nacimiento<input class="form-control" name="fecha" type="date" value="07 29 1999" id="fecha"></p>-->
        		<p>Clave<input class="form-control" name="pass" type="password" value="" id="pass" minlength="6" required="" autofocus=""></p>
        		<p>Confirmar Clave<input class="form-control" name="pass2" type="password" value="" id="pass2" required="" autofocus=""></p>
        		<!--<p>Foto<input class="form-control btn btn-info"  name="fichero" type="file" id="fichero"></p>
        		<span id="error" class='error1' style="display: none;"></span>
                <p>Preview</p><img  name="imagen" id="imagen" src="" alt="Imagen aqui" width="280" height="250">-->
            <p><input type="hidden" name="rol" id="rol" value="usuario" readonly></p>
            <p><input class="btn btn-info" type="submit" value="Registrarse" name="btnRegistro"></p>
    	    </fieldset>
    	   
    		</form>
    		<hr>
    		 <div id="mensaje" style="display: none;">&nbsp;</div>
		</div>
		</body >
  <?php }
  else
        { 
          echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
          <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
          <script type="text/javascript"> MostarBotones(); </script>
  <?php } ?>
    
        
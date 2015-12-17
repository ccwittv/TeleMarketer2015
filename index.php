<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/ingreso.css" rel="stylesheet">
  
   <!-- main css -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/media-queries.css" rel="stylesheet" type="text/css">
    <link href="css/ingreso.css" rel="stylesheet">
    <link href="css/style_telemarketer2015.css" rel="stylesheet">

    <!-- media queries css -->
    <link rel="stylesheet" href="bower_components/bootstrap-css/css/bootstrap.min.css">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="icon" href="http://www.octavio.com.ar/favicon.ico">
    <script type="text/javascript" src="js/funcionesAjax.js"></script>
    <script type="text/javascript" src="js/funcionesLogin.js"></script>
    <script type="text/javascript" src="js/funcionesABM.js"></script>
    <script type="text/javascript" src="js/funcionesMapa.js"></script>
        
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript">  
  </script>
 </head> 
 
<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
   <body>
    <div id="container">
      <header id="header"> 
        <div id="formLogin" class="container">
          <form  class="form-ingreso " onsubmit="validarLogin();return false;" style="margin: 0 auto">
            <h2 class="form-ingreso-heading">Ingrese sus Datos</h2>
            <label for="correo" class="sr-only">Usuario (correo electrónico)</label>
                    <input type="email" id="correo" class="form-control" placeholder="Usuario (correo electrónico)" required="" autofocus="" value="<?php  if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>">
            <label for="clave" class="sr-only">Clave</label>
            <input type="password" id="clave" minlength="6" class="form-control" placeholder="Clave" required="">
            <div class="checkbox">
              <label>
                <input type="checkbox" id="recordarme" checked> Recordame
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            <br>
            <input type="text"  class="form-control" readonly id="MensajeError" >        
          </form>
          
          <br>
          <form  class="form-ingreso" style="margin:auto">
            <h3 class="form-ingreso-heading"></h3>
                    <button class="btn btn-lg btn-warning btn-block" onclick="location.href = 'partes/formUsuarioJquery.php'" type="button">Registrarse</button> <br> 
                    <!--<button class="btn btn-lg btn-warning btn-block" onclick="MostrarLogin('RegistracionUsuario')" type="button">Registrar</button> <br> -->   
                    <!-- <a href='resetearclave/index.html' >Olvidé mi clave</a> -->
                    <button class="btn btn-lg btn-success btn-block" onClick="location.href = 'resetearclave/index.html'" type="button">Olvidé mi clave</button>
          </form>
        </div> <!-- /container -->
       </header> <!-- /header -->
    </div> 
   </body>

  <?php }
  else
        { 
          echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
          <!--<button onclick="deslogear();return false;" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>-->
          <?php header("Location: index_empleados.php"); ?>
          <!--<script type="text/javascript"> MostarBotones(); </script>-->
  <?php } ?>
</html>
  


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">  
</script>
 
<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formLogin" class="container">

      <form  class="form-ingreso " onsubmit="validarLogin();return false;">
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
      </form>
      
      <br>
      <form  class="form-ingreso " >
        <h5 class="form-ingreso-heading">Información</h5>
        <input type="text"  class="form-control" readonly id="MensajeError" >
        <h3 class="form-ingreso-heading">Registrar</h3>
                <button class="btn btn-lg btn-warning btn-block" onclick="Mostrar('RegistracionUsuario')" type="button">Registrar</button> <br>    
                <!-- <a href='resetearclave/index.html' >Olvidé mi clave</a> -->
                <button class="btn btn-lg btn-success btn-block" onClick="location.href = 'resetearclave/index.html'" type="button">Olvidé mi clave</button>
      </form>

    </div> <!-- /container -->

  <?php }
  else
        { 
          echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
          <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
          <script type="text/javascript"> MostarBotones(); </script>
  <?php } ?>
    
  

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<?php  
session_start();
if(isset($_SESSION['registrado'])){  
    if ($_SESSION['rol'] == 'supervisor') { ?>
      <div class="container">
        <form  class="form-ingreso " onsubmit="GuardarProducto(); return false;">
           <h2 class="form-ingreso-heading">Producto</h2>
            <label for="nombre" class="sr-only" hidden>Nombre</label>
                 <input type="text" id="nombre" class="form-control" placeholder="Nombre" required="" autofocus="">
            <label for="descripcion" class="sr-only" hidden>Descripción</label>
                 <input type="text" id="descripcion" class="form-control" placeholder="Descripción" required="" autofocus="">
            <label for="preciounitario" class="sr-only" hidden>Precio Unitario</label>
                 <input type="text" id="preciounitario" class="form-control" placeholder="Precio Unitario" required="" autofocus="">        
          
            <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
            <input type="hidden" name="id" id="id" readonly>
        </form>
      </div> <!-- /container -->
    <?php }
  else { echo"<h3>usted DEBE SER SUPERVISOR para ejecutar esta funcionalidad. </h3>"; }
  }
else
  {    
    echo"<h3>usted no esta logeado. </h3>"; 
  }

?>

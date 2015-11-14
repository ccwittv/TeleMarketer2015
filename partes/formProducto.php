<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">  
</script>

<?php  
session_start();
if(isset($_SESSION['registrado'])){  
    if ($_SESSION['rol'] == 'supervisor') { ?>
      <div class="container">
        <form  class="form-ingreso " onsubmit="GuardarProducto(); return false;" id="formProducto" enctype="multipart/form-data">
           <h2 class="form-ingreso-heading"> Producto </h2>
            <label for="nombre" class="sr-only" hidden>Nombre</label>
                 <input type="text" id="nombre" class="form-control" placeholder="Nombre" required="" autofocus="">
            <label for="descripcion" class="sr-only" hidden>Descripción</label>
                 <input type="text" id="descripcion" class="form-control" placeholder="Descripción" required="" autofocus="">
            <label for="preciounitario" class="sr-only" hidden>Precio Unitario</label>
                 <input type="text" id="preciounitario" class="form-control" placeholder="Precio Unitario" required="" autofocus="">        
          
            <input type="file" name="foto"  id="fichero" onchange="cargarFoto()" autofocus="" />
            <img  src="Fotos/no_image_for_this_product.gif" class="fotoform" id="imagen" autofocus="" />
            <p style="color: black;">*La foto se actualiza al guardar.</p>
            <span id="error" class='error1' style="display: none;"></span>
            
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

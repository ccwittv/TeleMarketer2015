
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">
  function HabilitarUno(idSelect,idInputText1)
   {      
      document.getElementById(idInputText1).disabled=false;
      document.getElementById(idInputText1).value = null;
      LlenarPrecioTotal(idSelect,idInputText1)
   }

   function LlenarPrecioTotal(idSelect,idInputText)
    {               
        var funcionAjax=$.ajax({
            url:"nexo.php",
            type:"post",
            data:{ queHacer:"TraerPrecioUnitario",
                   idProducto:document.getElementById(idSelect).value,
                 }
            });
        
        funcionAjax.done(function(retorno)
            { 
          //    alert(retorno);              
              document.getElementById('precio').value = retorno;
              document.getElementById('total').value = retorno * document.getElementById(idInputText).value;
            });
        funcionAjax.fail(function(retorno)
            {
              alert(retorno); 
            });
        funcionAjax.always(function(retorno)
            {  
             //alert(retorno);   
            });        
    }

   function LlenarDatosCliente(idSelect)
    {               
        var funcionAjax=$.ajax({
            url:"nexo.php",
            type:"post",
            data:{ queHacer:"TraerUnCliente",
                   idCliente:document.getElementById(idSelect).value,
                 }
            });
        
        funcionAjax.done(function(retorno)
            { 
          //    alert(retorno);   
              var cliente =JSON.parse(retorno);                  
              $("#fechanacimiento").val(cliente.fechanacimiento);              
              $("#sexo").val(cliente.sexo);                            

              var funcionAjaxTraerProvincia=$.ajax({
                  url:"nexo.php",
                  type:"post",
                  data:{ queHacer:"TraerUnaProvincia",
                         idProvincia:cliente.idprovincia,
                       }
                  });
              funcionAjaxTraerProvincia.done(function(respuesta)
                { 
                  $("#provincia").val(respuesta);
                }); 

              $("#localidad").val(cliente.localidad);
              $("#domicilio").val(cliente.domicilio);
              $("#tcelular").val(cliente.tcelular);
              $("#mail").val(cliente.mail);
              $("#tfijo").val(cliente.tfijo);
              $("#ttrabajo").val(cliente.ttrabajo);  
            });

        funcionAjax.fail(function(retorno)
            {
              alert(retorno); 
            });
        funcionAjax.always(function(retorno)
            {  
             //alert(retorno);   
            });        
    } 

</script>
 
<?php 
session_start();
require_once("clases/AccesoDatos.php");
require_once("clases/producto.php");
require_once("clases/cliente.php");
$arrayDeProductos=producto::TraerTodosLosProductos();
$arrayDeClientes=cliente::TraerTodosLosClientes();

if(isset($_SESSION['registrado'])){  ?>    
   <div class="container">
      <?php if ($_SESSION['rol'] === 'usuario') 
      {
         echo "<form  style='margin: 30px 0 0 269px'>";        
         echo '<button class="btn btn-danger" onclick="deslogear()" type="button"> <span class="glyphicon glyphicon-log-out"> SALIR</button> <br>';  
         echo "</form>";        
         echo "<br>";         
      } ?>
      <form  class="form-ingreso-ccw" onsubmit="GuardarVenta(); return false;" style="margin: 0 auto">        
        <h3 class="form-ingreso-heading">Venta</h3>
        <select id="producto" value="" required="" name="producto" onchange="HabilitarUno('producto','cantidad')">  
          <option value="" disabled selected >Seleccionar producto</option>
          <?php foreach ($arrayDeProductos as $producto) 
                {            
                  echo "<option value=$producto->id>$producto->nombre: $producto->descripcion</option>";                    
                }?>
        </select>
        <br>
        <input type="text" id="cantidad" min="1000000" max="99000000" value=""
               placeholder="Cantidad" required="" disabled style="width:100px" oninput="LlenarPrecioTotal('producto','cantidad')">
        <input type="text" disabled readonly id="precio" placeholder="Precio Unitario" style="width:100px" value="">
        <input type="text" disabled readonly id="total"  placeholder="Total" style="width:100px" value="">
        
        
        <div class="panel panel-default">
         <div class="panel-heading">Formas de pago:</div>
          <div class="panel-body">
            <label>
<!--             <input type="radio" Name="formaspago" id="formaspago" value="Transferencia o depósito" required="">Transferencia o depósito
             <input type="radio" Name="formaspago" id="formaspago" value="Otra forma de pago" required="">Otra forma de pago-->
             <input type="radio" Name="formaspago" id="transferencia" value="Transferencia o depósito" required="">Transferenca o depósito
             <input type="radio" Name="formaspago" id="otra" value="Otra forma de pago" required="">Otra forma de pago
            </label>
          </div> 
        </div> 
        
        <select id="cliente" required="" name="cliente" onchange="LlenarDatosCliente('cliente')">
            <option value="<?php if(isset($_COOKIE["idcliente"])){echo $_COOKIE["idcliente"];} ?>" selected ><?php if(isset($_COOKIE["idcliente"])){echo $_COOKIE["dnicliente"].": ".$_COOKIE["apeynomcliente"];} else { echo "Seleccionar Cliente";}?></option>
            <?php foreach ($arrayDeClientes as $cliente) 
                {            
                  if ($cliente->id != $_COOKIE["idcliente"])
                   {
                    echo "<option value=$cliente->id>$cliente->dni: $cliente->apeynom</option>";  
                   }                   
                }?>  
        </select>
        <br>
        Fecha Nacimiento: <input type="date" disabled readonly id="fechanacimiento" style="width:150px" value="<?php if(isset($_COOKIE["fechanacimientocliente"])){echo $_COOKIE["fechanacimientocliente"];} ?>">
        <br>
        Sexo: <input type="text" disabled readonly id="sexo" style="width:50px" value="<?php if(isset($_COOKIE["sexocliente"])){echo $_COOKIE["sexocliente"];} ?>">
        <br>
        Provincia: <input type="text" disabled readonly id="provincia" style="width:300px" value="<?php if(isset($_COOKIE["provinciacliente"])){echo $_COOKIE["provinciacliente"];} ?>" >
        <br>
        Localidad: <input type="text" disabled readonly id="localidad" style="width:300px" value="<?php if(isset($_COOKIE["localidadcliente"])){echo $_COOKIE["localidadcliente"];} ?>" >
        <br>
        Domicilio: <input type="text" disabled readonly id="domicilio" style="width:300px" value="<?php if(isset($_COOKIE["domiciliocliente"])){echo $_COOKIE["domiciliocliente"];} ?>" >
        <br>
        Teléfono celular: <input type="text" disabled readonly id="tcelular" style="width:300px" value="<?php if(isset($_COOKIE["tcelularcliente"])){echo $_COOKIE["tcelularcliente"];} ?>" >
        <br>
        Correo electrónico: <input type="text" disabled readonly id="mail" style="width:300px" value="<?php if(isset($_COOKIE["mailcliente"])){echo $_COOKIE["mailcliente"];} ?>" >
        <br>
        Teléfono fijo: <input type="text" disabled readonly id="tfijo" style="width:300px"  value="<?php if(isset($_COOKIE["tfijocliente"])){echo $_COOKIE["tfijocliente"];} ?>" >
        <br>
        Teléfono trabajo: <input type="text" disabled readonly id="ttrabajo" style="width:300px" value="<?php if(isset($_COOKIE["ttrabajocliente"])){echo $_COOKIE["ttrabajocliente"];} ?>" >
        <br> <br>
        <input type="text"  class="form-control" readonly id="MensajeError" >
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
         <?php if ($_SESSION['rol'] === 'usuario') 
          { ?>
             <a href="#" onclick="Mostrar('MostrarGrillaProductos')" class="btn btn-lg btn-success btn-block">Volver a Lista de Productos</a>               
         <?php } ?>        
        <input type="hidden" name="id" id="id" readonly>
      </form>

 </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">
  function HabilitarUno(idSelect,idInputText1)
   {      
      document.getElementById(idInputText1).disabled=false;
      document.getElementById(idInputText1).value = null;
      LlenarPrecioTotal(idSelect,idInputText1)
   }

  /*function HabilitarDos(idTextArea1,idTextArea2)
   {      
      document.getElementById(idTextArea1).disabled=false;
      document.getElementById(idTextArea2).disabled=false;
      document.getElementById(idTextArea1).value = null;
      document.getElementById(idTextArea2).value = null;
   }*/

   /*function HabilitarTres(idTextArea1)
   {      
      document.getElementById(idTextArea1).disabled=false;
   }*/

   /*function HabilitarPorCheckbox(idCheckBox, idTextArea)
    {
       
        if (document.getElementById(idCheckBox).checked) 
        {
          document.getElementById(idTextArea).disabled=false;
        }
        else
        {
          document.getElementById(idTextArea).disabled=true;
        }

    }*/

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
              //alert(retorno); 
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

            });

        funcionAjax.fail(function(retorno)
            {
              //alert(retorno); 
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

      <form  class="form-ingreso-ccw" onsubmit="GuardarVenta(); return false;">
        <h3 class="form-ingreso-heading">Carga Venta</h3>
        <select id="producto" required="" name="producto" onchange="HabilitarUno('producto','cantidad')">  
          <option value="" disabled selected >Seleccionar producto</option>
          <?php foreach ($arrayDeProductos as $producto) 
                {            
                  echo "<option value=$producto->id>$producto->nombre: $producto->descripcion</option>";                    
                }?>
        </select>
        <br>
        <input type="text" id="cantidad" min="1000000" max="99000000" 
               placeholder="Cantidad" required="" disabled style="width:100px" oninput="LlenarPrecioTotal('producto','cantidad')">
        <input type="text" disabled readonly id="precio" placeholder="Precio Unitario" style="width:100px" value="">
        <input type="text" disabled readonly id="total"  placeholder="Total" style="width:100px" value="">
        
        
        <div class="panel panel-default">
         <div class="panel-heading">Formas de pago:</div>
          <div class="panel-body">
            <label>
             <input type="radio" Name="formaspago" id="formaspago" value="Transferencia o depósito" required="">Transferencia o depósito
             <input type="radio" Name="formaspago" id="formaspago" value="Otra forma de pago" required="">Otra forma de pago
            </label>
          </div> 
        </div> 

        <select id="cliente" required="" name="cliente" onchange="LlenarDatosCliente('cliente')" >
            <option value="" disabled selected >Seleccionar cliente</option>
            <?php foreach ($arrayDeClientes as $cliente) 
                {            
                  echo "<option value=$cliente->id>$cliente->dni: $cliente->apeynom</option>";                    
                }?>
        </select>
        <br>
        Fecha Nacimiento: <input type="date" disabled readonly id="fechanacimiento" style="width:150px">
        <br>
        Sexo: <input type="text" disabled readonly id="sexo" style="width:50px">
        <br>
        Provincia: <input type="text" disabled readonly id="provincia" style="width:300px">
        <br>
        Localidad: <input type="text" disabled readonly id="localidad" style="width:300px">
        <br>
        
        <!--<textarea id="localidad" class="form-control" disabled placeholder="Localidad"></textarea>
        <br>
        <textarea id="domicilio" class="form-control" disabled placeholder="Domicilio"></textarea>
        <br>
        
        <label>
            <input type="radio" Name="sexo" id="sexo" value="M" onclick="HabilitarTres('apellidonombre')">Masculino
            <input type="radio" Name="sexo" id="sexo" value="F" onclick="HabilitarTres('apellidonombre')">Femenino
        </label>
        <br>
        
        <label for="DNI" class="sr-only" hidden>DNI</label>
                <input type="text" id="dni" class="" placeholder="DNI" required="">
        <br>
        <textarea id="apellidonombre" class="form-control" disabled placeholder="Apellido y nombre"></textarea>      

        <fieldset class="checkbox">
            <legend class="checkbox"><h5>Contacto 1:</h5></legend> 
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="telefonocelular" onclick="HabilitarPorCheckbox('telefonocelular','tcelular')"> Teléfono celular </input> 
                    <input type="text" id="tcelular" value="" disabled required=""> </input> </br>
                    <input type="checkbox" id="correoelectronico" onclick="HabilitarPorCheckbox('correoelectronico','mail')"> Correo electrónico </input> 
                    <input type="text" id="mail" value="" disabled required=""> </input> </br>
                  </label>  
                </div>
             </leggend>
         </fieldset> 

         <fieldset class="checkbox">
            <legend class="checkbox"><h5>Contacto 2:</h5></legend> 
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="telefonofijo" onclick="HabilitarPorCheckbox('telefonofijo','tfijo')"> Teléfono fijo </input> 
                    <input type="text"    id="tfijo" value="" disabled required=""> </input> </br>
                    <input type="checkbox" id="telefonotrabajo" onclick="HabilitarPorCheckbox('telefonotrabajo','ttrabajo')"> Teléfono trabajo </input> 
                    <input type="text" id="ttrabajo" value="" disabled required=""> </input> </br>                    
                  </label>  
                </div>
             </leggend>
         </fieldset> -->
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">
  function Habilitar(idTextArea1,idTextArea2)
   {
      document.getElementById(idTextArea1).disabled=false;
      document.getElementById(idTextArea2).disabled=false;
   }

   function HabilitarPorCheckbox(idCheckBox, idTextArea)
    {
       
        if (document.getElementById(idCheckBox).checked) 
        {
          document.getElementById(idTextArea).disabled=false;
        }
        else
        {
          document.getElementById(idTextArea).disabled=true;
        }

    }
</script>
 
<?php 
session_start();
require_once("clases/AccesoDatos.php");
require_once("clases/provincia.php");
$arrayDeProvincias=provincia::TraerTodasLasProvincias();

if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form  class="form-ingreso-ccw" onsubmit="GuardarVoto(); return false;">
        <h2 class="form-ingreso-heading">Datos Cliente</h2>
        <select id="producto" required="" name="producto" onchange="Habilitar('cantidad')">  
          <option value="" disabled selected >Seleccionar producto</option>
          <option value="Producto1">Articulo 1</option>
          <option value="Producto2">Articulo 2</option>
          <option value="Producto3">Articulo 3</option> 
        </select>
        
        <input type="text" id="cantidad" min="1000000" max="99000000" placeholder="Cantidad" required="" disabled style="width:100px">
        <input type="text" disabled id="precio" placeholder="Precio Unitario" style="width:100px">
        <input type="text" disabled id="total"  placeholder="Total" style="width:100px">
        
        
        <div class="panel panel-default">
         <div class="panel-heading">Formas de pago:</div>
          <div class="panel-body">
            <label>
             <input type="radio" Name="formaspago" id="formaspago" value="T" required="">Transferencia o depósito
             <input type="radio" Name="formaspago" id="formaspago" value="O" required="">Otra forma de pago
            </label>
          </div> 
        </div> 

        <select id="provincia" required="" onchange="Habilitar('localidad','domicilio')" name="provincia" >
            <option value="" disabled selected >Seleccionar provincia</option>
            <?php foreach ($arrayDeProvincias as $provincia) 
                {            
                  echo "<option value='$provincia->provincia'>$provincia->provincia</option>";
                    
                }?>
        </select>
        <br>
        <textarea id="localidad" class="form-control" disabled placeholder="Localidad"></textarea>
        <br>
        <textarea id="domicilio" class="form-control" disabled placeholder="Domicilio"></textarea>
        <br>
        
        <label>
            <input type="radio" Name="sexo" id="sexo" value="M" onchange="Habilitar('apellidonombre')">Masculino
            <input type="radio" Name="sexo" id="sexo" value="F" onchange="Habilitar('apellidonombre')">Femenino
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
                    <input type="text" id="tcelular" value="" disabled> </input> </br>
                    <input type="checkbox" id="correoelectronico" onclick="HabilitarPorCheckbox('correoelectronico','mail')"> Correo electrónico </input> 
                    <input type="text" id="mail" value="" disabled> </input> </br>
                  </label>  
                </div>
             </leggend>
         </fieldset> 

         <fieldset class="checkbox">
            <legend class="checkbox"><h5>Contacto 2:</h5></legend> 
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="telefonofijo" onclick="HabilitarPorCheckbox('telefonofijo','tfijo')"> Teléfono fijo </input> 
                    <input type="text"    id="tfijo" value="" disabled> </input> </br>
                    <input type="checkbox" id="telefonotrabajo" onclick="HabilitarPorCheckbox('telefonotrabajo','ttrabajo')"> Teléfono trabajo </input> 
                    <input type="text" id="ttrabajo" value="" disabled> </input> </br>                    
                  </label>  
                </div>
             </leggend>
         </fieldset> 
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  

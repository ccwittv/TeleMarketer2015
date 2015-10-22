
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

//      'input:radio[name="sexo"][value="F"]').prop('checked', true)
    }
</script>
 
<?php 
 
session_start();
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
        
        <input type="text" id="cantidad" min="1000000" max="99000000" placeholder="Cantidad" required="" disabled>
        
        
        <div class="panel panel-default">
         <div class="panel-heading">Formas de pago:</div>
          <div class="panel-body">
            <label>
             <input type="radio" Name="formaspago" id="formaspago" value="T">Transferencia o depósito
             <input type="radio" Name="formaspago" id="formaspago" value="O">Otra forma de pago
            </label>
          </div> 
        </div> 

        <select id="provincia" required="" onchange="Habilitar('localidad','domicilio')" name="provincia" >
            <option value="" disabled selected >Seleccionar provincia</option>
            <option value="Provincia1">Buenos Aires</option>
            <option value="Provincia2">CABA</option>
            <option value="Provincia3">Neuquen</option>
        </select>
        <br>
        <textarea id="localidad" disabled placeholder="Localidad"></textarea>
        <br>
        <textarea id="domicilio" disabled placeholder="Domicilio"></textarea>
        <br>
        
        <label>
            <input type="radio" Name="sexo" id="sexo" value="M">Masculino
            <input type="radio" Name="sexo" id="sexo" value="F">Femenino
        </label>
        <br>
        
        <label for="DNI" class="sr-only" hidden>DNI</label>
                <input type="text" id="dni" class="" placeholder="DNI" required="">
        <br>      
        <label for="apellido" class="sr-only" hidden>apellido</label>
                <input type="text" id="apellido" class="" placeholder="Apellido" required="">
        <label for="nombre" class="sr-only" hidden>nombre</label>
                <input type="text" id="nombre" class="" placeholder="Nombre" required="">               
          
        <!--<div class="panel panel-default">
            <div class="panel-heading">Contacto 1</div>
              <div class="panel-body">-->
         <fieldset class="checkbox">
            <legend class="checkbox"><h5>Contacto 1:</h5></legend> 
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="telefonofijo"    onchange="HabilitarPorCheckbox('telefonofijo','contactouno')"> Telefono fijo <br />
                    <input type="checkbox" id="telefonotrabajo" onclick="HabilitarPorCheckbox('telefonotrabajo','contactouno')"> Telefono trabajo <br />
                    <input type="checkbox" id="telefonocelular" onclick="HabilitarPorCheckbox('telefonocelular','contactouno')"> Telefono celular
                  </label>  
                </div>
             </leggend>
         </fieldset> 
              <!--</div>
        </div>   -->
        <textarea id="contactouno" disabled placeholder="Contacto"></textarea>   
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  

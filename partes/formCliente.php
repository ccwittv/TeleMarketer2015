
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">
  function HabilitarUno(idSelect,idInputText1)
   {      
      document.getElementById(idInputText1).disabled=false;
      document.getElementById(idInputText1).value = null;
      LlenarPrecioTotal(idSelect,idInputText1)
   }

  function HabilitarDos(idTextArea1,idTextArea2)
   {      
      document.getElementById(idTextArea1).disabled=false;
      document.getElementById(idTextArea2).disabled=false;
      document.getElementById(idTextArea1).value = null;
      document.getElementById(idTextArea2).value = null;
   }

   function HabilitarTres(idTextArea1)
   {      
      document.getElementById(idTextArea1).disabled=false;
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

   function ChequearDNI(idInputText) 
    {
      var funcionAjax=$.ajax({
            url:"nexo.php",
            type:"post",
            data:{ queHacer:"TraerUnClientePorDNI",
                   dni:document.getElementById(idInputText).value,
                 }
            });
        
        funcionAjax.done(function(retorno)
            { 
              if (retorno.trim()=="EXISTE")
                {
                  alert("El cliente EXISTE. Modificar datos por grilla de clientes");    
                }           
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
require_once("clases/provincia.php");
require_once("clases/producto.php");
$arrayDeProvincias=provincia::TraerTodasLasProvincias();
$arrayDeProductos=producto::TraerTodosLosProductos();

if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form  class="form-ingreso-ccw" onsubmit="GuardarCliente(); return false;">
        <h3 class="form-ingreso-heading">Cargar Cliente</h3>
        
        <label for="DNI" class="sr-only" hidden>DNI</label>
                <input type="text" id="dni" class="" placeholder="DNI" required="" oninput="ChequearDNI('dni')">
        <br>
        <br> 
        Fecha Nacimiento <input type="date" id="fechanacimiento" class="" placeholder="Fecha Nacimiento" required="">
        <br>

        <label>
            <input type="radio" Name="sexo" id="sexom" value="M" onclick="HabilitarTres('apellidonombre')">Masculino
            <input type="radio" Name="sexo" id="sexof" value="F" onclick="HabilitarTres('apellidonombre')">Femenino
        </label>
        <br>

        <textarea id="apellidonombre" class="form-control" disabled placeholder="Apellido y nombre"></textarea>      
        <br>

        <select id="provincia" required="" onchange="HabilitarDos('localidad','domicilio')" name="provincia" >
            <option value="" disabled selected >Seleccionar provincia</option>
            <?php foreach ($arrayDeProvincias as $provincia) 
                {            
                  echo "<option value=$provincia->id>$provincia->provincia</option>";                    
                }?>
        </select>
        <br>
        <textarea id="localidad" class="form-control" disabled placeholder="Localidad"></textarea>
        <br>
        <textarea id="domicilio" class="form-control" disabled placeholder="Domicilio"></textarea>
        <br>
        
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
         </fieldset> 
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  

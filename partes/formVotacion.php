
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form  class="form-ingreso " onsubmit="GuardarVoto(); return false;">
        <h2 class="form-ingreso-heading">Votar</h2>
        <label for="Provincia" class="sr-only" hidden>Provincia</label>
                <input type="text" id="provincia" class="form-control" placeholder="Provincia" required="" autofocus="">
        <label for="localidad" class="sr-only" hidden>Localidad</label>
                <input type="text" id="localidad" class="form-control" placeholder="Localidad" required="" autofocus="">
        <label for="direccion" class="sr-only" hidden>Provincia</label>
                <input type="text" id="direccion" class="form-control" placeholder="Direccion" required="" autofocus="">
        <select id="candidato">
          <option value="Candidato1">Candidato 1</option>
          <option value="Candidato2">Candidato 2</option>
          <option value="Candidato3">Candidato 3</option>
        </select>
        <br>
          <label>
            <input type="radio" Name="sexo" id="sexo" value="M" checked>Masculino
            <input type="radio" Name="sexo" id="sexo" value="F">Femenino
          </label>
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  

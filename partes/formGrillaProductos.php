
<?php 
	session_start();
	require_once("clases/AccesoDatos.php");
	require_once("clases/producto.php");	
	$arrayDeProductos=producto::TraerTodosLosProductos();
	if(isset($_SESSION['registrado'])){  ?>
		<script type="text/javascript">
		$("#content").css("width", "900px");

         function ChequearDNI(idInputText) 
		    {		
		      
              var funcionAjaxCookiesClientes=$.ajax({
		            url:"nexo.php",
		            type:"post",
		            data:{ queHacer:"CargarCookiesClientes",
		                   dni:document.getElementById(idInputText).value,
		                 }
		            });

              funcionAjaxCookiesClientes.fail(function(retorno)
		            {
		              alert(retorno); 
		            });

		      var funcionAjax=$.ajax({
		            url:"nexo.php",
		            type:"post",
		            data:{ queHacer:"TraerUnClientePorDNI",
		                   dni:document.getElementById(idInputText).value,
		                 }
		            });
		        
		        funcionAjax.done(function(retorno)
		            { 
		              var cliente =JSON.parse(retorno);
		              
		              //Se muestra el apellido y nombre correspondiente al dni
		              document.getElementById('apeynom').value = cliente.apeynom;
		              
		              //Aca se habilitan los botones		              		              
		              var botonesproductos = document.getElementsByName('venderproducto');     				  
    				  for (var i=0; i<botonesproductos.length; i++)
    				   { 
        				 if (cliente.apeynom == null)
        				    botonesproductos[i].disabled= true; 
						 else
		               		botonesproductos[i].disabled= false;          				
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
         if ($_SESSION['rol'] === 'supervisor')
     	  {	
            echo "<table class='table'  style='background-color: beige;'>
				<thead>
					<tr>
						<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Descripción</th><th>Precio Unitario</th><th>Foto</th>
					</tr>
				</thead>
				<tbody>";
     	  }
	     else if ($_SESSION['rol'] === 'usuario') 
		  { ?>
		   		<input type="number" oninput="ChequearDNI('dni')" class="form-control" placeholder="DNI" required="" id="dni" style="width:200px">
		  <?php  echo '<input type="text" value class="form-control" placeholder="Nombre Cliente" required="" id="apeynom" disabled style="width:200px">';       
	       echo "<br>";	
		   echo "<table class='table'  style='background-color: beige;'>
				<thead>
					<tr>
						<th>Vender</th><th>Nombre</th><th>Descripción</th><th>Precio Unitario</th><th>Foto</th>
					</tr>
				</thead>
				<tbody>";           				
		  } ?>			
    	<?php     	
		foreach ($arrayDeProductos as $producto) 
			{    			
				echo"<tr>";
					 if ($_SESSION['rol'] === 'supervisor')
					   { 	
						 echo "<td><a onclick='EditarProducto($producto->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
						       <td><a onclick='BorrarProducto($producto->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>";
					   }
					 else if ($_SESSION['rol'] === 'usuario')
					   { 
					   	 //echo "<td><a onclick='VenderProducto($producto->id)' id='$producto->id' disabled class='btn btn-primary'> <span class='glyphicon glyphicon-shopping-cart'>&nbsp;</span>Vender</a></td>";
					   	 echo "<td><button onclick='VenderProducto($producto->id)' name='venderproducto' id='$producto->id' disabled class='btn btn-primary'> <span class='glyphicon glyphicon-shopping-cart'>&nbsp;</span>Vender</button></td>";
					   }  

					echo "<td>$producto->nombre</td>
            			<td>$producto->descripcion</td>
            			<td>$producto->preciounitario</td>
            			<td><img  class='fotoGrilla' style='width:70px;height:70px;' src='Fotos/".$producto->foto."' /></td>			
					</tr>";
			}		
		
		echo	"</tbody>		
			</table>";

		if ($_SESSION['rol'] === 'usuario') 	
		 {	?>		 	
		 		<button class='btn btn-info' onclick='Mostrar("CargarCliente")' type='button'>Cargar Cliente</button>
	     <?php	echo '<button class="btn btn-danger" onclick="deslogear()" type="button"> <span class="glyphicon glyphicon-log-out">&nbsp;</span> SALIR</button>';  				  
		 }	 		
	}	
	else 
	{ 
      echo"<h3>usted no esta logeado. </h3>"; 
	} ?>
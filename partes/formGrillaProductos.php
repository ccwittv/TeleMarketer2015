
<?php 
	session_start();
	require_once("clases/AccesoDatos.php");
	require_once("clases/producto.php");	
	$arrayDeProductos=producto::TraerTodosLosProductos();
	if(isset($_SESSION['registrado'])){  ?>
		<script type="text/javascript">
		$("#content").css("width", "900px");
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
		  {
	       echo '<button class="btn btn-success" onclick="deslogear()" type="button"> <span class="glyphicon glyphicon-log-out"> SALIR</button> <br>';  
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
					   	 echo "<td><a onclick='VenderProducto($producto->id)' class='btn btn-primary'> <span class='glyphicon glyphicon-shopping-cart'>&nbsp;</span>Vender</a></td>";
					   }  

					echo "<td>$producto->nombre</td>
            			<td>$producto->descripcion</td>
            			<td>$producto->preciounitario</td>
            			<td><img  class='fotoGrilla' style='width:70px;height:70px;' src='Fotos/".$producto->foto."' /></td>			
					</tr>";
			}			  
		}
	else 
	{ 
      echo"<h3>usted no esta logeado. </h3>"; 
	} ?>
	</tbody>
</table>


<?php 
	session_start();
	require_once("clases/AccesoDatos.php");
	require_once("clases/producto.php");	
	$arrayDeProductos=producto::TraerTodosLosProductos();
	if(isset($_SESSION['registrado'])){  ?>
		<script type="text/javascript">
		$("#content").css("width", "900px");
		</script>
		<table class="table"  style=" background-color: beige;">
			<thead>
				<tr>
					<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Descripción</th><th>Precio Unitario</th>
				</tr>
			</thead>
			<tbody>
    	<?php 
		foreach ($arrayDeProductos as $producto) 
			{    
				echo"<tr>
						<td><a onclick='EditarProducto($producto->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
						<td><a onclick='BorrarProducto($producto->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
						<td>$producto->nombre</td>
            			<td>$producto->descripcion</td>
            			<td>$producto->preciounitario</td>			
					</tr>";
			}			  
		}
	else 
	{ 
      echo"<h3>usted no esta logeado. </h3>"; 
	} ?>
	</tbody>
</table>

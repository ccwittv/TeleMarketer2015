
<?php 
	session_start();
	require_once("clases/AccesoDatos.php");
	require_once("clases/provincia.php");
	require_once("clases/cliente.php");	
	require_once("clases/usuario.php");	
	require_once("clases/producto.php");	
	require_once("clases/venta.php");	
	$arrayDeVentas=venta::TraerTodasLasVentas();
	if(isset($_SESSION['registrado'])){  ?>
		<script type="text/javascript">
		$("#content").css("width", "900px");
		</script>
		<table class="table"  style=" background-color: beige;">
			<thead>
				<tr>
					<th>Editar</th><th>Borrar</th><th>Detalles</th>
					<th>Nombre Cliente</th>
					<th>Provincia</th>
					<th>Nombre Vendedor</th>
					<th>Nombre Producto</th>
					<th>Cantidad</th>
					<th>Precio unitario</th>
					<th>Precio final</th>
					<th>Forma de pago</th>
					<th>Fecha de Venta</th>
				</tr>
			</thead>
			<tbody>
    	<?php 
		foreach ($arrayDeVentas as $venta) 
			{    
				$usuario=usuario::TraerUnUsuario($venta->idusuario);
				$cliente=cliente::TraerUnCliente($venta->idcliente);
				$provincia=provincia::TraerUnaProvincia($cliente->idprovincia);
				echo"<tr>
						<td><a onclick='EditarVenta($venta->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
						<td><a onclick='BorrarVenta($venta->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
						<td><a onclick='Detalles($venta->id)' class='btn btn-info'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Ver en mapa</a></td>
						<td>$cliente->apeynom</td>
						<td>$provincia->provincia</td>						
						<td>$usuario->apellido $usuario->nombre</td>
     				 </tr>";
			}			  
		}
	else 
	{ 
      echo"<h3>usted no esta logeado. </h3>"; 
	} ?>
	</tbody>
</table>

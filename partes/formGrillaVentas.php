
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
					<th>Editar</th><th>Borrar</th>
					<th>ID</th>
					<th>Nombre_Cliente</th>
					<th>Provincia</th>
					<th>Vendedor</th>
					<th>Producto</th>
					<th>Cant.</th>
					<th>P.Unitario</th>
					<th>P.Final</th>
					<th>Forma_pago</th>
					<th>Fecha_Venta</th>
				</tr>
			</thead>
			<tbody>
    	<?php 
		foreach ($arrayDeVentas as $venta) 
			{    
				$cliente=cliente::TraerUnCliente($venta->idcliente);
				$provincia=provincia::TraerUnaProvincia($cliente->idprovincia);
				$usuario=usuario::TraerUnUsuario($venta->idusuario);				
				$producto=producto::TraerUnProducto($venta->idproducto);
				$preciofinal = $venta->cantidad * $producto->preciounitario;
				echo"<tr>
						<td><a onclick='EditarVenta($venta->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
						<td><a onclick='BorrarVenta($venta->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
						<!--<td><a onclick='DetallesVenta($venta->id)' class='btn btn-info'>   <span class='glyphicon glyphicon-info-sign'>&nbsp;</span>Detalles</a></td>-->
						<td>$venta->id</td>
						<td>$cliente->apeynom</td>
						<td>$provincia->provincia</td>						
						<td>$usuario->apellido, $usuario->nombre</td>
						<td>$producto->nombre</td>
						<td>$venta->cantidad</td>
						<td>$producto->preciounitario</td>
						<td>$preciofinal</td>
						<td>$venta->formadepago</td>
						<td>$venta->fechaventa</td>
     				 </tr>";
			}			  
		}
	else 
	{ 
      echo"<h3>usted no esta logeado. </h3>"; 
	} ?>
	</tbody>
</table>

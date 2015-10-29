
<?php 
	session_start();
	require_once("clases/AccesoDatos.php");
	require_once("clases/provincia.php");
	require_once("clases/cliente.php");	
	$arrayDeClientes=cliente::TraerTodosLosClientes();
	if(isset($_SESSION['registrado'])){  ?>
		<script type="text/javascript">
		$("#content").css("width", "900px");
		</script>
		<table class="table"  style=" background-color: beige;">
			<thead>
				<tr>
					<th>Editar</th><th>Borrar</th><th>Id</th><th>DNI</th><th>Fecha de Nacimiento</th><th>Sexo</th><th>Apellido_y_Nombre</th><th>Provincia</th><th>Localidad</th><th>Domicilio</th>
					<th>Teléfono_Celular</th><th>Correo_Electrónico</th><th>Teléfono_fijo</th><th>Teléfono_trabajo</th>
				</tr>
			</thead>
			<tbody>
    	<?php 
		foreach ($arrayDeClientes as $cliente) 
			{    
				$provincia=provincia::TraerUnaProvincia($cliente->idprovincia);
				echo"<tr>
						<td><a onclick='EditarCliente($cliente->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
						<td><a onclick='BorrarCliente($cliente->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
						<td>$cliente->id</td>
						<td>$cliente->dni</td>
            			<td>$cliente->fechanacimiento</td>
            			<td>$cliente->sexo</td>		
            			<td>$cliente->apeynom</td>
            			<td>$provincia->provincia</td>						
					</tr>";
			}			  
		}
	else 
	{ 
      echo"<h3>usted no esta logeado. </h3>"; 
	} ?>
	</tbody>
</table>

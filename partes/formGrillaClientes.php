
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
					<th>Editar</th><th>Borrar</th><th>Ver en mapa</th><th>DNI</th><th>Fecha de Nacimiento</th>
					<!--<th>Sexo</th>-->
					<th>Apellido_y_Nombre</th><th>Provincia</th><th>Localidad</th><th>Domicilio</th>
					<th>Telefono_Celular</th><th>Correo_Electrónico</th>
					<!--<th>Teléfono_fijo</th><th>Teléfono_trabajo</th>-->
				</tr>
			</thead>
			<tbody>
    	<?php 
		foreach ($arrayDeClientes as $cliente) 
			{    
				$provincia=provincia::TraerUnaProvincia($cliente->idprovincia);
				$ubicacion = '"'.$provincia->provincia.'"'.',"'.$cliente->domicilio.'"'.',"'.$cliente->localidad.'"'.',"'.$cliente->id.'"'
								.',"'.$cliente->dni.'"'.',"'.$cliente->fechanacimiento.'"'.',"'.$cliente->sexo.'"'.',"'.$cliente->apeynom.'"'
								.',"'.$cliente->tcelular.'"'.',"'.$cliente->mail.'"'.',"'.$cliente->tfijo.'"'.',"'.$cliente->ttrabajo.'"';
				echo"<tr>
						<!--<td><a onclick='EditarCliente($cliente->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
						<td><a onclick='BorrarCliente($cliente->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
						<td><a onclick='VerEnMapa($ubicacion)' class='btn btn-info'>   <span class='glyphicon glyphicon-map-marker'>&nbsp;</span>Ver en mapa</a></td>-->
						<td><a onclick='EditarCliente($cliente->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span></a></td>
						<td><a onclick='BorrarCliente($cliente->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span></a></td>
						<td><a onclick='VerEnMapa($ubicacion)' class='btn btn-info'>   <span class='glyphicon glyphicon-map-marker'>&nbsp;</span></a></td>
						<td>$cliente->dni</td>
            			<td>$cliente->fechanacimiento</td>
            			<!--<td>$cliente->sexo</td>-->		
            			<td>$cliente->apeynom</td>
            			<td>$provincia->provincia</td>
            			<td>$cliente->localidad</td>
     					<td>$cliente->domicilio</td>     					
     					<td>$cliente->tcelular</td>
     					<td>$cliente->mail</td>
     					<!--<td>$cliente->tfijo</td>-->
     					<!--<td>$cliente->ttrabajo</td>-->
     				 </tr>";
			}
		 echo	"</tbody>		
			</table>"; ?>
		 <button class='btn btn-info' onclick='VerTodosEnMapa(<?php echo json_encode($arrayDeClientes); ?>)' type='button'><span class='glyphicon glyphicon-map-marker'>&nbsp;</span>Ver todos en Mapa</button>
	<?php  }
	else 
	{ 
      echo"<h3>usted no esta logeado. </h3>"; 
	} ?>
<!--	</tbody>
</table>-->

<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/voto.php");
	$arrayDevotos=voto::TraerTodoLosvotos();

 ?>
<script type="text/javascript">
$("#content").css("width", "900px");
</script>

<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>DNI</th><th>Candidato</th><th>Sexo</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Ver</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDevotos as $voto) {
    $l = '"'.$voto->provincia. '"'.',"'.$voto->localidad. '"'.',"'.$voto->direccion. '"'.',"'.$voto->id. '"';
	echo"<tr>
			<td><a onclick='Editarvoto($voto->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='Borrarvoto($voto->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
			<td>$voto->dni</td>
			<td>$voto->candidato</td>
            <td>$voto->sexo</td>
            <td>$voto->direccion</td>
            <td>$voto->localidad</td>
            <td>$voto->provincia</td>
            <td><a onclick='VerEnMapa($l)' class='btn btn-info'>Ver en mapa</a></td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>

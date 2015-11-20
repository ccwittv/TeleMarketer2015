<?php
	session_start();
	require_once("clases/AccesoDatos.php");
	require_once('clases/usuario.php');
	//var_dump($_SERVER);
?>
<html>
<head>

	<script type="text/javascript">
         //si le pongo llaves es un objeto, es lo mismo que poner new object
			var datos = {};

			//aca se define una función igualada a datos. O sea que datos a partir de ahora empieza a ser la función. Y la funcion cuando se termina abajo se autoinvoca
			//Al crearse se invoca (con el cierre de llaves la estoy invocando)
			//Lo unico que se ve de datos es var url donde tiene urLocal y urlEsterna

			datos = (function(){

				//var _varPrivada = "hola";				
				var local = "http://localhost/TeleMarketer2015/ws/usuario/";
				var externa = "http://localhost/TeleMarketer2015/ws/usuario/"
				
				var url = {
					urlLocal: local,
					urlExterna: externa
				};

				return url;
			})();
	</script>
    <script type="text/javascript">
		function renderLista(data) {
			
			var lista = data == null ? [] : (data instanceof Array ? data : [data]);
			
			$('#listaVendedores tr:not(:first)').remove();
			
			$.each(lista, function(index, usuario) {
						
				$('#listaVendedores').append("<tr><td>"+ usuario.nombre +
											 "</td><td>"+ usuario.apellido + 
											 "</td><td>"+ usuario.id +
											 "</td><td>"+ usuario.mail+" ("+usuario.rol+")" +
											 "</td><td>"+ usuario.fechaingreso +"</td></tr>");
											 //+"</td><td>");				

			});
		}

		function cargar(){
				$.ajax({
			        type: "GET",
			        url: datos.urlLocal,
			        success: function(data, textStatus, jqXHR){
			        	//alert(data);			        	
			            // console.log(data);
			            renderLista(data);
			        },
			        error: function(jqXHR, textStatus, errorThrown){
			            // console.log(errorThrown);
			            alert("No se pudo modificar " + errorThrown);
			        }
			    });
		}
    </script>
</head>
  <body>
 	<!--<table class='table table-hover table-responsive' id="listaVendedores">-->
 	<table class="table"  style=" background-color: beige;" id="listaVendedores">
		<thead>
			<tr>			
				<th>  Nombre     	</th>
				<th>  Apellido   	</th>
				<th>  Id 		 	</th>
				<th>  Mail 			</th>
				<th>  Fecha Ingreso </th>
			</tr> 
		</thead>			
        <tr>
        </tr> 
		<tbody>	
			<?php
			  echo "<script>";
			  echo "cargar()";
			  echo "</script>";  
			?>	
		</tbody>	

	</table>
  </body>	
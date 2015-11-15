
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">  
</script>

<?php  
session_start();
if(isset($_SESSION['registrado'])){  
    if ($_SESSION['rol'] == 'supervisor') { 
        require_once("clases/AccesoDatos.php");
        require_once("clases/venta.php");
        require_once("clases/usuario.php");
        $estadisticas = venta::TraerEstadisticas(); ?>

        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <table class="table" id="datatable" style=" background-color: beige; display:none">
        	<thead>
        		<tr>
        			<th>Vendedor</th><th>Cantidad Ventas</th>
        		</tr>
        	</thead>
        	<tbody>

        		<?php 
        foreach ($estadisticas as $row) {
        	echo"<tr>
        			<td>".$row['ApellidoVendedor'].", ".$row['NombreVendedor']."</td>
        			<td>".$row["CantidadVenta"]."</td>
        		</tr>   ";
        }
        		 ?>
        	</tbody>
        </table>

        <script type="text/javascript">
            $(function () {
            $('#container').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Top 5 Vendedores con más Ventas'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Cantidad Ventas'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' ' + this.point.name.toLowerCase();
                    }
                }
            });
        });

        </script>

 <?php }
  else { echo"<h3>usted DEBE SER SUPERVISOR para ejecutar esta funcionalidad. </h3>"; }
  }
else
  {    
    echo"<h3>usted no esta logeado. </h3>"; 
  }

?>
<script type="text/javascript">  
    function mostrar_mensaje(mensaje)
     {
       alert(mensaje);
       window.location.href = '../index.php';
//       document.window.getElementById("principal").innerHTML;
     }
</script>

<?php
session_start();
require_once("../clases/AccesoDatos.php");
require_once("../clases/venta.php");
require_once("../clases/provincia.php");
require_once("../clases/dompdf/dompdf_config.inc.php");      

if(isset($_SESSION['registrado']))
{  
    if ($_SESSION['rol'] == 'supervisor') 
    {             	
//Se limpia el buffer      
      ob_start(); ?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Documento sin título</title>
      </head>
      <body>
      <table width="100px" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="14" bgcolor="skyblue"><CENTER><strong>REPORTE DE VENTAS</strong></CENTER></td>
        </tr>
        <tr bgcolor="red">
          <td><strong>Nro de cliente</strong></td>,
          <td><strong>Sexo</strong></td>,
          <td><strong>Nombre</strong></td>,
          <td><strong>Provincia</strong></td>,
          <td><strong>Celular</strong></td>,
          <td><strong>Mail</strong></td>,
          <td><strong>Producto</strong></td>
          <td><strong>Precio Unitario</strong></td>
          <td><strong>Cant.</strong></td>
          <td><strong>Precio Final</strong></td>
          <td><strong>Forma de Pago</strong></td>
          <td><strong>Fecha de Venta</strong></td>
          <td><strong>Vendedor</strong></td>
          <td><strong>Mail Vendedor</strong></td>
        </tr>
        

      <?php $reporteventas = venta::TraerVentasBajadaArchivos();

      foreach ($reporteventas as $row) 
         { 
              $provincia = provincia::TraerUnaProvincia($row['IdProvincia']); 
              
              echo " <tr>
                  <td>".$row['Nro_cliente']."</td>
                  <td>".$row['Sexo']."</td>
                  <td>".$row['Apellido_Nombre']."</td>
                  <td>".$provincia->provincia."</td>
                  <td>".$row['Celular']."</td>
                  <td>".$row['Mail']."</td>
                  <td>".$row['Producto']."</td>
                  <td>".$row['Precio_Unitario']."</td>
                  <td>".$row['Cantidad']."</td>
                  <td>".$row['Precio_Final']."</td> 
                  <td>".$row['Forma_Pago']."</td>
                  <td>".$row['Fecha_Venta']."</td>                  
                  <td>".$row['Apellido_Usuario'].", ".$row['Nombre_Usuario']."</td>                  
                  <td>".$row['Mail_Usuario']."</td>                  
                </tr>";
        } ?>
      </table>
      </body>
      </html>  

 <?php     
        $dompdf = new DOMPDF();
        $dompdf->set_paper("A4", "landscape");  
        $dompdf->load_html(ob_get_clean()); //tomo unicamente lo que se generó en el buffer
        $dompdf->render();
        $pdf = $dompdf->output();
        $filename = "Reporte_Ventas.pdf";
        file_put_contents($filename, $pdf);
        $dompdf->stream($filename);

        /*$dompdf=new DOMPDF();
        $dompdf->set_paper("A4", "landscape");
        $dompdf->load_html($codigoHTML);
        ini_set("memory_limit","128M");
        $dompdf->render();
        $dompdf->stream("Reporte_Ventas.pdf");*/


        /*$dompdf=new DOMPDF();
        $dompdf->set_paper("A4", "landscape");
        $dompdf->load_html($codigoHTML);
        ini_set("memory_limit","128M");
        $dompdf->render();      
        $pdf = $dompdf->output();
        file_put_contents("Reporte_Ventas.pdf", $pdf);*/
    }
  else 
   { 
    echo "<script>";
    echo "mostrar_mensaje('usted DEBE SER SUPERVISOR para ejecutar esta funcionalidad')"; 
    echo "</script>"; 
   }
  } 
else
  {    
    echo "<script>";
    echo "mostrar_mensaje('usted no esta logeado')"; 
    echo "</script>";
  } 
?>
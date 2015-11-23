<?php

require_once("../clases/AccesoDatos.php");
require_once("../clases/venta.php");
require_once("../clases/provincia.php");
require_once("../clases/dompdf/dompdf_config.inc.php");

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="7" bgcolor="skyblue"><CENTER><strong>REPORTE DE VENTAS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>Nro de cliente</strong></td>,
    <td><strong>DNI</strong></td>,
    <td><strong>Fecha de Nacimiento</strong></td>,
    <td><strong>Sexo</strong></td>,
    <td><strong>Nombre</strong></td>,
    <td><strong>Provincia</strong></td>,
    <td><strong>Localidad</strong></td>,
    <td><strong>Domicilio</strong></td>,
    <td><strong>Celular</strong></td>,
    <td><strong>Mail</strong></td>,
    <td><strong>Teléfono Fijo</strong></td>,
    <td><strong>Teléfono Trabajo</strong></td>,
    <td><strong>Producto</strong></td>
    <td><strong>Descripcion</strong></td>
    <td><strong>Precio Unitario</strong></td>
    <td><strong>Cantidad</strong></td>
    <td><strong>Precio Final</strong></td>
    <td><strong>Forma de Pago</strong></td>
    <td><strong>Fecha de Venta</strong></td>
  </tr>';
  

$reporteventas = venta::TraerVentasBajadaArchivos();

foreach ($reporteventas as $row) {
  $provincia = provincia::TraerUnaProvincia($row['IdProvincia']);
  # code...
  $codigoHTML.='	
  	<tr>
      <td>'.$row['Nro_cliente'].'</td>
      <td>'.$row['DNI'].'</td>
      <td>'.$row['Fecha_Nacimiento'].'</td>
      <td>'.$row['Sexo'].'</td>
      <td>'.$row['Apellido_Nombre'].'</td>
      <td>'.$provincia->provincia.'</td>
      <td>'.$row['Localidad'].'</td>
      <td>'.$row['Domicilio'].'</td>
      <td>'.$row['Celular'].'</td>
      <td>'.$row['Mail'].'</td>
      <td>'.$row['Tel_Fijo'].'</td>
      <td>'.$row['Tel_Trabajo'].'</td>
  		<td>'.$row['Producto'].'</td>
  		<td>'.$row['Descripcion_Producto'].'</td>
  		<td>'.$row['Precio_Unitario'].'</td>
  		<td>'.$row['Cantidad'].'</td>
  		<td>'.$row['Precio_Final'].'</td>	
  		<td>'.$row['Forma_Pago'].'</td>
  		<td>'.$row['Fecha_Venta'].'</td>									
  	</tr>';
}
	
$codigoHTML.='
</table>
</body>
</html>';
//$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->set_paper("A4", "landscape");
$dompdf->load_html($codigoHTML);
//$dompdf->render();
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_Ventas.pdf");
?>
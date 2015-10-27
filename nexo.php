<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/producto.php");
require_once("clases/venta.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'CargarVenta':
		include("partes/formVenta.php");
		break;
	case 'desloguear':
		include("php/deslogearUsuario.php");
		break;		
	case 'MostrarGrillaProductos':
		include("partes/formGrillaProductos.php");
		break;
	case 'MostarLogin':
		include("partes/formLogin.php");
		break;
	case 'MostrarFormAltaProducto':
		include("partes/formProducto.php");
		break;
    case 'VerEnMapa':        
        include("partes/formMapa.php");
		break;
	case 'TraerPrecioUnitario':        
        $productoBuscado = producto::TraerUnProducto($_POST['idProducto']);
        echo $productoBuscado->preciounitario;	
		break;	
	case 'BorrarProducto':
		session_start();
    	if ($_SESSION['rol'] == 'supervisor') 
    		{	
				$producto = new producto();
				$producto->id=$_POST['id'];
				$cantidad=$producto->BorrarProducto($producto->id);
				echo $cantidad; 
			}
		else 
			{ 
				echo "usted DEBE SER SUPERVISOR para ejecutar esta funcionalidad.";
			}				
		break;
    case 'GuardarProducto':
		$producto = new producto();
		$producto->id=$_POST['id'];
		$producto->nombre=$_POST['nombre'];
		$producto->descripcion=$_POST['descripcion'];
		$producto->preciounitario=$_POST['preciounitario'];
		$idInsertado=$producto->GuardarProducto($producto->id,$producto->nombre,$producto->descripcion,$producto->preciounitario);
		echo $idInsertado;
		break;		
	case 'GuardarVenta':
        session_start();
		$venta = new venta();
		$venta->id=$_POST['id'];			
		$venta->producto=$_POST['producto'];
		$venta->cantidad=$_POST['cantidad'];
		$venta->formadepago=$_POST['formadepago'];
		$venta->fechaventa=$_POST['fechaventa'];
		$venta->provincia=$_POST['provincia'];
		$venta->localidad=$_POST['localidad'];
		$venta->domicilio=$_POST['domicilio'];
		$venta->sexo=$_POST['sexo'];
		$venta->dni=$_POST['dni'];
		$venta->apeynom=$_POST['apeynom'];
		$venta->tcelular=$_POST['tcelular'];
		$venta->mail=$_POST['mail'];
		$venta->tfijo=$_POST['tfijo'];
		$venta->ttrabajo=$_POST['ttrabajo'];
		$venta->mailusuarioregistrado = $_SESSION['registrado'];

		$acumuladorIdsInsertados=$venta->GuardarVenta(
											$venta->id,
											$venta->producto,
            								$venta->cantidad,
            								$venta->formadepago,
											$venta->fechaventa,
            								$venta->provincia,
            								$venta->localidad,
            								$venta->domicilio,
            								$venta->sexo,
            								$venta->dni,
            								$venta->apeynom,
            								$venta->tcelular,
            								$venta->mail,
            								$venta->tfijo,
            								$venta->ttrabajo,
            								$venta->mailusuarioregistrado
										  );

		if ($acumuladorIdsInsertados<>null)
			{
			  echo "Venta agregada";
			}
		break;
	case 'TraerProducto':
		$producto = producto::TraerUnProducto($_POST['id']);		
		echo json_encode($producto);
		break;    
	default:
		# code...
		break;
}

 ?>
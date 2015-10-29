<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/producto.php");
require_once("clases/venta.php");
require_once("clases/cliente.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'CargarVenta':
		include("partes/formVenta.php");
		break;
	case 'CargarCliente':
		include("partes/formCliente.php");
		break;	
	case 'MostrarGrillaClientes':
		include("partes/formGrillaClientes.php");
		break;
	case 'CargarProducto':
		include("partes/formProducto.php");
		break;			
	case 'MostrarGrillaProductos':
		include("partes/formGrillaProductos.php");
		break;
	case 'MostarLogin':
		include("partes/formLogin.php");
		break;
	case 'desloguear':
		include("php/deslogearUsuario.php");
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
	case 'GuardarCliente':
        session_start();
		$cliente=cliente::TraerUnClientePorDNI($_POST['dni']);		
		if (($cliente->id)<>0)
			{
				echo "El cliente EXISTE. Modificar datos por grilla de clientes";
			}
        else
        	{
				$cliente = new cliente();
				$cliente->id=$_POST['id'];
				$cliente->dni=$_POST['dni'];		
				$cliente->fechanacimiento=$_POST['fechanacimiento'];
				$cliente->sexo=$_POST['sexo'];	
				$cliente->apeynom=$_POST['apeynom'];
				$cliente->idprovincia=$_POST['idprovincia'];
				$cliente->localidad=$_POST['localidad'];
				$cliente->domicilio=$_POST['domicilio'];		
				$cliente->tcelular=$_POST['tcelular'];
				$cliente->mail=$_POST['mail'];
				$cliente->tfijo=$_POST['tfijo'];
				$cliente->ttrabajo=$_POST['ttrabajo'];
				$idInsertado=$cliente->GuardarCliente(
														$cliente->id,
														$cliente->dni,	
														$cliente->fechanacimiento,
														$cliente->sexo,	
														$cliente->apeynom,
														$cliente->idprovincia,
														$cliente->localidad,
														$cliente->domicilio,		
														$cliente->tcelular,
														$cliente->mail,
														$cliente->tfijo,
														$cliente->ttrabajo
												  	  );
				if ($idInsertado<>null)
					{
					  echo "Cliente agregado";
					}
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
	case 'TraerUnClientePorDNI':
		$cliente=cliente::TraerUnClientePorDNI($_POST['dni']);		
		if (($cliente->id)<>0)
			{
				echo "EXISTE";
			}
		break;    	    
	default:
		# code...
		break;
}

 ?>
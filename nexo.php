<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/producto.php");
require_once("clases/venta.php");
require_once("clases/cliente.php");
require_once("clases/provincia.php");
require_once("clases/usuario.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'CargarVenta':
		include("partes/formVenta.php");
		break;
	case 'MostrarGrillaVentas':
		include("partes/formGrillaVentas.php");
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
		if (isset($cliente->id))
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
				if ($idInsertado<>0)
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
		$venta->idcliente=$_POST['idcliente'];
		$usuarioBuscado = usuario::TraerUnUsuario($_SESSION['registrado']);
		$venta->idusuario = $usuarioBuscado->id;

		$acumuladorIdsInsertados=$venta->GuardarVenta(
											$venta->id,
											$venta->producto,
            								$venta->cantidad,
            								$venta->formadepago,
											$venta->fechaventa,
											$venta->idcliente,
            								$venta->idusuario
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
	case 'TraerUnCliente':
		$cliente=cliente::TraerUnCliente($_POST['idCliente']);		
		echo json_encode($cliente);
		break;    	    	
	case 'TraerUnaProvincia':
		$provincia=provincia::TraerUnaProvincia($_POST['idProvincia']);		
		echo $provincia->provincia;
		break;    	    		
	default:
		# code...
		break;
}

 ?>
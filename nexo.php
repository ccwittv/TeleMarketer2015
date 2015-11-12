<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/producto.php");
require_once("clases/venta.php");
require_once("clases/cliente.php");
require_once("clases/provincia.php");
require_once("clases/usuario.php");
require_once("clases/datoscompletosventa.php");
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
		$idCliente = $_POST['id'];
		if ($idCliente > 0) //si idCliente es mayor que cero quiere decir que es una modificacion de un cliente existente
		  {
                $cliente = cliente::TraerUnCliente($idCliente);
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
		  }
		else
		  {  
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
						
						if ($idInsertado<>0)
							{
							  echo "Cliente agregado";
							}
					}
		   }
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
        /*session_start();
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
			}*/		
		break;							  
    case 'GuardarProducto':
		session_start();
		$producto = new producto();
		$producto->id=$_POST['id'];
		$producto->nombre=$_POST['nombre'];
		$producto->descripcion=$_POST['descripcion'];
		$producto->preciounitario=$_POST['preciounitario'];
        $foto = $_POST['foto'];
        
		$ruta=getcwd();  //ruta directorio actual
        $rutaDestino=$ruta."/Fotos/";
    	$NOMEXT=explode(".", $_FILES['fichero0']['name']);
    	//$NOMEXT=explode(".", $foto);
        $EXT=end($NOMEXT);
        $nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
        $rutaActual = $ruta."/FotosTemp/".$nomarch;

        $nuevoNombreDeFoto = $producto->nombre.".".$EXT;
        //Renombro con el email/usuario
        rename ($ruta."/FotosTemp/".$nomarch,$ruta."/FotosTemp/".$nuevoNombreDeFoto);
        $rutaActual = $ruta."/FotosTemp/".$nuevoNombreDeFoto;
        echo $nomarch;
        echo "	</br>";
        echo $rutaActual;
         echo "	</br>";
        echo $rutaDestino.$nuevoNombreDeFoto;
         echo "	</br>";
        //Muevo a carpeta Fotos
		rename($rutaActual,$rutaDestino.$nuevoNombreDeFoto);
		$producto->foto=$nuevoNombreDeFoto;
		var_dump($_FILES);

		$idInsertado=$producto->GuardarProducto($producto->id,
												$producto->nombre,
												$producto->descripcion,
												$producto->preciounitario,
												$producto->foto);
		echo $idInsertado;
		break;		
	case 'GuardarVenta':
        session_start();
        $idVenta = $_POST['id'];			
		if ($idVenta > 0) //solo cargar el id del usuario a una venta nueva 
			{
				$venta = venta::TraerUnaVenta($idVenta);
				$venta->idproducto=$_POST['producto'];
				$venta->cantidad=$_POST['cantidad'];
				$venta->formadepago=$_POST['formadepago'];
				$venta->idcliente=$_POST['idcliente'];
			}
        else
			{			
				$venta = new venta();
				$venta->id=$idVenta;
				$venta->idproducto=$_POST['producto'];
				$venta->cantidad=$_POST['cantidad'];
				$venta->formadepago=$_POST['formadepago'];
				$venta->fechaventa=$_POST['fechaventa'];
				$venta->idcliente=$_POST['idcliente'];
				$usuarioBuscado = usuario::TraerUnUsuarioMail($_SESSION['registrado']);
				$venta->idusuario = $usuarioBuscado->id;
			}	

		$acumuladorIdsInsertados=$venta->GuardarVenta(
											$venta->id,
											$venta->idproducto,
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
		else
			{
			  echo "Cambio registrada";
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
	case 'BorrarCliente':
		session_start();
    	$cliente = new cliente();
		$cliente->id=$_POST['id'];
		$cantidad=$cliente->BorrarCliente($cliente->id);				
		break;	    	    		    	    	
	case 'TraerUnaProvincia':
		$provincia=provincia::TraerUnaProvincia($_POST['idProvincia']);		
		echo $provincia->provincia;
		break;    	    		
	case 'TraerVenta':
		$ventaCompletaBuscada=datoscompletosventa::TraerUnaVentaCompleta($_POST['idVenta']);		
		echo json_encode($ventaCompletaBuscada);
		break;
	case 'BorrarVenta':
		session_start();
    	$venta = new venta();
		$venta->id=$_POST['id'];
		$cantidad=$venta->BorrarVenta($venta->id);				
		break;	    	    			
	default:
		# code...
		break;
}

 ?>
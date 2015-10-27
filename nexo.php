<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/producto.php");
require_once("clases/venta.php");
require_once("clases/voto.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'CargarVenta':
		include("partes/formVenta.php");
		break;
	case 'desloguear':
			include("php/deslogearDni.php");
		break;	
	case 'MostarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formVenta.php");
		break;
    case 'VerEnMapa':        
        include("partes/formMapa.php");
		break;
	case 'TraerPrecioUnitario':        
        $productoBuscado = producto::TraerUnProducto($_POST['idProducto']);
        echo $productoBuscado->preciounitario;	
		break;	
	case 'BorrarVoto':
		$voto = new voto();
		$voto->id=$_POST['id'];
		$cantidad=$voto->Borrarvoto();
		echo $cantidad;
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
	case 'TraerVoto':
			$voto = voto::TraerUnvoto($_POST['id']);		
			echo json_encode($voto);

		break;
    case 'guardarMarcadores':
        /*session_start();
        if(isset($_POST["marcadores"]))
        {
            $filename = "ArchivosTxt/marcadores" . getdate()[0] . ".txt";

            $_SESSION['file'] = $filename;
            $puntos = $_POST["marcadores"];

            $file = fopen($filename, "w");

            foreach ($puntos as $valor)
            {
                $lat =  $valor["lat"];
                $lng =  $valor["lng"];
                $nombre =  $valor["nombre"];
                fwrite($file, $lat.">".$lng.">".$nombre . PHP_EOL);
            }
        fclose($file);

        echo "Marcadores guardados con exito";
        }
        else
            echo "No ingreso marcador/es a guardar";*/
        break;
	default:
		# code...
		break;
}

 ?>
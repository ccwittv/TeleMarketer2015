<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/voto.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'votacion':
		include("partes/formVotacion.php");
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
			include("partes/formVotacion.php");
		break;
    case 'VerEnMapa':
        
        include("partes/formMapa.php");
		break;
	case 'BorrarVoto':
			$voto = new voto();
			$voto->id=$_POST['id'];
			$cantidad=$voto->Borrarvoto();
			echo $cantidad;

		break;
	case 'GuardarVoto':
            session_start();
			$voto = new voto();
			$voto->id=$_POST['id'];
			$voto->dni=$_SESSION['registrado'];
			$voto->candidato=$_POST['candidato'];
			$voto->provincia=$_POST['provincia'];
            $voto->localidad=$_POST['localidad'];
            $voto->direccion=$_POST['direccion'];
			$voto->sexo=$_POST['sexo'];
			$cantidad=$voto->Guardarvoto();
			echo $cantidad;

		break;
	case 'TraerVoto':
			$voto = voto::TraerUnvoto($_POST['id']);		
			echo json_encode($voto);

		break;
    case 'guardarMarcadores':
        session_start();
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
            echo "No ingreso marcador/es a guardar";
        break;
	default:
		# code...
		break;
}

 ?>
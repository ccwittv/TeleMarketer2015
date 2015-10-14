<?php 
session_start();
$dni=$_POST['dni'];
$recordar=$_POST['recordarme'];

	if($recordar=="true")
	{
		setcookie("registro",$dni,  time()+36000 , '/');
		
	}
	$_SESSION['registrado']=$dni;
	$retorno="ingreso";


echo $retorno;
?>
<?php
class cliente
  { 
   	 public $id;
	 public	$dni;
	 public	$fechanacimiento;
	 public	$sexo;
	 public	$apeynom;
     public	$idprovincia;
     public	$localidad;
     public	$domicilio;
     public	$tcelular;
     public	$mail;
     public	$tfijo;
     public	$ttrabajo;

     public function BorrarCliente($id)
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarCliente(:pid)");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	 }

     public static function TraerTodosLosClientes()
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta=$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosClientes");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS,"cliente");		
		}

	 public static function TraerUnCliente($id)
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnCliente(:pid)");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);
			$consulta->execute();			
			$clienteBuscado= $consulta->fetchObject('cliente');
			return $clienteBuscado;	
		}

	public static function TraerUnClientePorDNI($dni)
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnClientePorDNI(:pdni)");
			$consulta->bindValue(':pdni',$dni, PDO::PARAM_INT);
			$consulta->execute();			
			$clienteBuscado= $consulta->fetchObject('cliente');
			return $clienteBuscado;	
		}	
		

	public function GuardarCliente($id,$dni,$fechanacimiento,$sexo,$apeynom,$idprovincia,$localidad,$domicilio,$tcelular,$mail,$tfijo,$ttrabajo)
	 {

	 	if($id>0)
	 		{
	 			$this->ModificarCliente($id,$dni,$fechanacimiento,$sexo,$apeynom,$idprovincia,$localidad,$domicilio,$tcelular,$mail,$tfijo,$ttrabajo);
	 		}else {
	 			$this->InsertarCliente($dni,$fechanacimiento,$sexo,$apeynom,$idprovincia,$localidad,$domicilio,$tcelular,$mail,$tfijo,$ttrabajo);
	 		}

	 }

	public function ModificarCliente($id,$dni,$fechanacimiento,$sexo,$apeynom,$idprovincia,$localidad,$domicilio,$tcelular,$mail,$tfijo,$ttrabajo)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL ModificarCliente(:pid,:pdni,:pfechanacimiento,
																:psexo,:papeynom,:pidprovincia,:plocalidad,
																:pdomicilio,:ptcelular,:pmail,:ptfijo,:pttrabajo)");
			$consulta->bindValue(':pid',$id,PDO::PARAM_INT);
			$consulta->bindValue(':pdni',$dni,PDO::PARAM_INT);
			$consulta->bindValue(':pfechanacimiento',$fechanacimiento,PDO::PARAM_STR);
			$consulta->bindValue(':psexo',$sexo,PDO::PARAM_STR);
			$consulta->bindValue(':papeynom',$apeynom,PDO::PARAM_STR);	
			$consulta->bindValue(':pidprovincia',$idprovincia,PDO::PARAM_STR);
			$consulta->bindValue(':plocalidad',$localidad,PDO::PARAM_STR);
			$consulta->bindValue(':pdomicilio',$domicilio,PDO::PARAM_STR);
			$consulta->bindValue(':ptcelular',$tcelular,PDO::PARAM_STR);
			$consulta->bindValue(':pmail',$mail,PDO::PARAM_STR);
			$consulta->bindValue(':ptfijo',$tfijo,PDO::PARAM_STR);
			$consulta->bindValue(':pttrabajo',$ttrabajo,PDO::PARAM_STR);
			return $consulta->execute();
	 }
	
  
	 public function InsertarCliente($dni,$fechanacimiento,$sexo,$apeynom,$idprovincia,$localidad,$domicilio,$tcelular,$mail,$tfijo,$ttrabajo)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarCliente(:pdni,:pfechanacimiento,:psexo,
																					 :papeynom,:pidprovincia,:plocalidad,
																					 :pdomicilio,:ptcelular,:pmail,
																					 :ptfijo,:pttrabajo)");
				$consulta->bindValue(':pdni',$dni,PDO::PARAM_INT);
				$consulta->bindValue(':pfechanacimiento',$fechanacimiento,PDO::PARAM_STR);
				$consulta->bindValue(':psexo',$sexo,PDO::PARAM_STR);
				$consulta->bindValue(':papeynom',$apeynom,PDO::PARAM_STR);	
				$consulta->bindValue(':pidprovincia',$idprovincia,PDO::PARAM_STR);
				$consulta->bindValue(':plocalidad',$localidad,PDO::PARAM_STR);
				$consulta->bindValue(':pdomicilio',$domicilio,PDO::PARAM_STR);
				$consulta->bindValue(':ptcelular',$tcelular,PDO::PARAM_STR);
				$consulta->bindValue(':pmail',$mail,PDO::PARAM_STR);
				$consulta->bindValue(':ptfijo',$tfijo,PDO::PARAM_STR);
				$consulta->bindValue(':pttrabajo',$ttrabajo,PDO::PARAM_STR);
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();			
	 }

  }

?>  
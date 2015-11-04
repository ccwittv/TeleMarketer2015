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
			$consulta =$objetoAccesoDato->RetornarConsulta("Delete from cliente where id = :pid");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	 }

     public static function TraerTodosLosClientes()
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta=$objetoAccesoDato->RetornarConsulta("select * from cliente");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS,"cliente");		
		}

	 public static function TraerUnCliente($id)
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from cliente where id = :pid");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);
			$consulta->execute();			
			$clienteBuscado= $consulta->fetchObject('cliente');
			return $clienteBuscado;	
		}

	public static function TraerUnClientePorDNI($dni)
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from cliente where dni = :pdni");
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
			$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE cliente set dni=:pdni,fechanacimiento=:pfechanacimiento,sexo=:psexo,apeynom=:papeynom,
								   idprovincia=:pidprovincia,localidad=:plocalidad,domicilio=:domicilio,
								   tcelular=:ptcelular,mail=:pmail,
								   tfijo=:ptfijo,ttrabajo=:pttrabajo
				WHERE id = :pid");
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
			$consulta->bindValue(':ptrabajo',$ttrabajo,PDO::PARAM_STR);
			return $consulta->execute();
	 }
	
  
	 public function InsertarCliente($dni,$fechanacimiento,$sexo,$apeynom,$idprovincia,$localidad,$domicilio,$tcelular,$mail,$tfijo,$ttrabajo)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
					INSERT into cliente (dni,fechanacimiento,sexo,apeynom,idprovincia,localidad,domicilio,tcelular,mail,tfijo,ttrabajo)
					                     values 
					                    (:pdni,:pfechanacimiento,:psexo,:papeynom,:pidprovincia,:plocalidad,:pdomicilio,:ptcelular,:pmail,:ptfijo,:pttrabajo)");
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
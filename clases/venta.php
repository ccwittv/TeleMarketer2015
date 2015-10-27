<?php
require_once("clases/usuario.php");
class venta
{
	public $id;
	public $producto;
    public $cantidad;
    public $formadepago;
	public $fechaventa;
	public $provincia;
	public $localidad;
	public $domicilio;
	public $sexo;
	public $dni;
	public $apeynom;
	public $tcelular;
	public $mail;
	public $tfijo;
	public $ttrabajo;
	public $mailusuarioregistrado;
	
	public function GuardarVenta($id,$producto,$cantidad,$formadepago,$fechaventa,$provincia,$localidad,
	 							  $domicilio,$sexo,$dni,$apeynom,$tcelular,$mail,$tfijo,$ttrabajo,$mailusuarioregistrado)
	  {

	 	if($id>0)
	 		{
	 			$this->ModificarVenta();
	 			$acumuladorIdsInsertados=null;
	 		}else {
	 			$ultimoIdInsertadoVenta = $this->InsertarVenta($producto,$cantidad,$formadepago,$fechaventa,$provincia,$localidad,
	 							  	 $domicilio,$sexo,$dni,$apeynom,$tcelular,$mail,$tfijo,$ttrabajo);
	 			$usuarioBuscado= usuario::TraerUnUsuario($this->mailusuarioregistrado);				  	 	 			
	 			$ultimoIdInsertadoRelacion = $this->InsertarRelacionUsuarioVenta($usuarioBuscado->id,$ultimoIdInsertadoVenta);
	 			$acumuladorIdsInsertados = $ultimoIdInsertadoVenta + $ultimoIdInsertadoRelacion;
	 		}
	 	return $acumuladorIdsInsertados;
	  } 

	public function InsertarVenta($producto,$cantidad,$formadepago,$fechaventa,$provincia,$localidad,
	 							  	 $domicilio,$sexo,$dni,$apeynom,$tcelular,$mail,$tfijo,$ttrabajo)
	    {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
//				$consulta =$objetoAccesoDato->RetornarConsulta("
//					CALL InsertarElvoto('$this->dni','$this->candidato','$this->provincia','$this->sexo', '$this->localidad', '$this->direccion')");
				$consulta =$objetoAccesoDato->RetornarConsulta("
					INSERT into venta (idproducto,cantidad,formadepago,fechaventa,provincia,localidad,domicilio,sexo,dni,apeynom,telefonocelular,correoelectronico,telefonofijo,telefonotrabajo)
					                  values
					                  (:pidproducto,:pcantidad,:pformadepago,:pfechaventa,:pprovincia,:plocalidad,:pdomicilio,:psexo,:pdni,:papeynom,:ptcelular,:pmail,:ptfijo,:ptrabajo)");
				$consulta->bindValue(':pidproducto',$producto,PDO::PARAM_INT);
				$consulta->bindValue(':pcantidad',$cantidad,PDO::PARAM_INT);
				$consulta->bindValue(':pformadepago',$formadepago,PDO::PARAM_STR);
				$consulta->bindValue(':pfechaventa',$fechaventa,PDO::PARAM_STR);
				$consulta->bindValue(':pprovincia',$provincia,PDO::PARAM_STR);
				$consulta->bindValue(':plocalidad',$localidad,PDO::PARAM_STR);
				$consulta->bindValue(':pdomicilio',$domicilio,PDO::PARAM_STR);
				$consulta->bindValue(':psexo',$sexo,PDO::PARAM_STR);
				$consulta->bindValue(':pdni',$dni,PDO::PARAM_INT);
				$consulta->bindValue(':papeynom',$apeynom,PDO::PARAM_STR);
				$consulta->bindValue(':ptcelular',$tcelular,PDO::PARAM_STR);
				$consulta->bindValue(':pmail',$mail,PDO::PARAM_STR);
				$consulta->bindValue(':ptfijo',$tfijo,PDO::PARAM_STR);
				$consulta->bindValue(':ptrabajo',$ttrabajo,PDO::PARAM_STR);
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();				
	    }
	 
	 public function InsertarRelacionUsuarioVenta($idusuarioregistrado,$ultimoIdInsertadoVenta)
	  {
	  	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	  	$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuariosventas (idusuario,idventa) values (:pidusuario,:pidventa)");
	  	$consulta->bindValue(':pidusuario',$idusuarioregistrado,PDO::PARAM_INT);
	  	$consulta->bindValue(':pidventa',$ultimoIdInsertadoVenta,PDO::PARAM_INT);
	  	$consulta->execute();
	    return $objetoAccesoDato->RetornarUltimoIdInsertado();				
	  }
	 

/*  	public function Borrarvoto()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL Borrarvoto($this->id)");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function Modificarvoto()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				CALL Modificarvoto('$this->id', '$this->candidato','$this->provincia', '$this->sexo', '$this->localidad', '$this->direccion')");
			return $consulta->execute();
	 } 

  	public static function TraerTodoLosvotos()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodoLosvotos()");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "voto");		
	 }

	public static function TraerUnvoto($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnvoto('$id')");
			$consulta->execute();
			$votoBuscado= $consulta->fetchObject('voto');
			return $votoBuscado;				

			
	}

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->dni."  ".$this->provincia."  ".$this->candidato;
	}*/

}
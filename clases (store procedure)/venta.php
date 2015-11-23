<?php
//require_once("clases/usuario.php");
class venta
{
	public $id;
	public $idproducto;
    public $cantidad;
    public $formadepago;
	public $fechaventa;
	public $idcliente;
	public $idusuario;
	
 	public function BorrarVenta($id)
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("Delete from venta where id = :pid");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	 }

	public static function TraerTodasLasVentas()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from venta");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "venta");		
	}

	public static function TraerUnaVenta($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from venta where id=:pid");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);
			$consulta->execute();			
			$ventaBuscada= $consulta->fetchObject('venta');
			return $ventaBuscada;	
	}

	public function GuardarVenta($id,$producto,$cantidad,$formadepago,$fechaventa,$idcliente,$idusuario)
	  {

	 	if($id>0)
	 		{
	 			$this->ModificarVenta($id,$producto,$cantidad,$formadepago,$fechaventa,$idcliente,$idusuario);
	 			$acumuladorIdsInsertados=null;
	 		}
	 	else 
	 	   {	
	 			$ultimoIdInsertadoVenta = $this->InsertarVenta($producto,$cantidad,$formadepago,$fechaventa,$idcliente,$idusuario);
	 			$acumuladorIdsInsertados = $ultimoIdInsertadoVenta;
	 	   }
	 	return $acumuladorIdsInsertados;
	  } 

	public function ModificarVenta($id,$producto,$cantidad,$formadepago,$fechaventa,$idcliente,$idusuario)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE venta set idproducto  = :pidproducto, 
							 	 cantidad 	 = :pcantidad, 
							 	 formadepago = :pformadepago,
							 	 fechaventa  = :pfechaventa,
							 	 idcliente   = :pidcliente,
							 	 idusuario   = :pidusuario
				WHERE id = :pid");
			$consulta->bindValue(':pid',$id,PDO::PARAM_INT);
			$consulta->bindValue(':pidproducto',$producto,PDO::PARAM_INT);
			$consulta->bindValue(':pcantidad',$cantidad,PDO::PARAM_INT);
			$consulta->bindValue(':pformadepago',$formadepago,PDO::PARAM_STR);
			$consulta->bindValue(':pfechaventa',$fechaventa,PDO::PARAM_STR);
			$consulta->bindValue(':pidcliente',$idcliente,PDO::PARAM_INT);
			$consulta->bindValue(':pidusuario',$idusuario,PDO::PARAM_INT);
			return $consulta->execute();
	 }

	public function InsertarVenta($producto,$cantidad,$formadepago,$fechaventa,$idcliente,$idusuario)
	    {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
					INSERT into venta (idproducto,cantidad,formadepago,fechaventa,idcliente,idusuario)
					                  values
					                  (:pidproducto,:pcantidad,:pformadepago,:pfechaventa,:pidcliente,:pidusuario)");
				$consulta->bindValue(':pidproducto',$producto,PDO::PARAM_INT);
				$consulta->bindValue(':pcantidad',$cantidad,PDO::PARAM_INT);
				$consulta->bindValue(':pformadepago',$formadepago,PDO::PARAM_STR);
				$consulta->bindValue(':pfechaventa',$fechaventa,PDO::PARAM_STR);
				$consulta->bindValue(':pidcliente',$idcliente,PDO::PARAM_INT);
				$consulta->bindValue(':pidusuario',$idusuario,PDO::PARAM_INT);
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();				
	    }

	public static function TraerEstadisticas() 
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select count(*) as CantidadVenta, 
																   venta.id as NroVenta, 
																   venta.idusuario as NroVendedor,  
																   usuario.nombre as NombreVendedor,
																   usuario.apellido as ApellidoVendedor 
																   from venta
																   inner join usuario
																   on venta.idusuario = usuario.id 
																   group by NroVendedor order by CantidadVenta desc limit 5");
			$consulta->execute();
      		return $consulta->fetchAll();		
    }    

}
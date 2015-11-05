<?php
require_once("clases/usuario.php");
class venta
{
	public $id;
	public $producto;
    public $cantidad;
    public $formadepago;
	public $fechaventa;
	public $idcliente;
	public $idusuario;
	
	public function GuardarVenta($id,$producto,$cantidad,$formadepago,$fechaventa,$idcliente,$idusuario)
	  {

	 	if($id>0)
	 		{
	 			$this->ModificarVenta();
	 			$acumuladorIdsInsertados=null;
	 		}
	 	else 
	 	   {	
	 			$ultimoIdInsertadoVenta = $this->InsertarVenta($producto,$cantidad,$formadepago,$fechaventa,$idcliente,$idusuario);
	 			$acumuladorIdsInsertados = $ultimoIdInsertadoVenta;
	 	   }
	 	return $acumuladorIdsInsertados;
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

}
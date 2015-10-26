<?php
class producto
  { 
   	 public $id;
     public $nombre;
     public $descripcion;
     public $preciounitario;

     public static function TraerTodosLosProductos()
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from producto");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "producto");		
		}

	public static function TraerUnProducto($id)
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from producto where id = :pid");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);
			$consulta->execute();			
			$productoBuscado= $consulta->fetchObject('producto');
			return $productoBuscado;	
		}	
  }

?>  
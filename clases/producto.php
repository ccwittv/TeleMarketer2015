<?php
class producto
  { 
   	 public $id;
     public $nombre;
     public $descripcion;
     public $preciounitario;
     public $foto;

     public function BorrarProducto($id)
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("Delete from producto where id = :pid");
			$consulta->bindValue(':pid',$id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	 }

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

	public function GuardarProducto($id,$nombre,$descripcion,$preciounitario,$foto)
	 {

	 	if($id>0)
	 		{
	 			$this->ModificarProducto($id,$nombre,$descripcion,$preciounitario,$foto);
	 		}else {
	 			$this->InsertarProducto($nombre,$descripcion,$preciounitario,$foto);
	 		}

	 }

	public function ModificarProducto($id,$nombre,$descripcion,$preciounitario,$foto)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE producto set nombre = :pnombre, descripcion = :pdescripcion, preciounitario = :ppreciounitario, foto = :pfoto,
				WHERE id = :pid");
			$consulta->bindValue(':pid',$id,PDO::PARAM_INT);
			$consulta->bindValue(':pnombre',$nombre,PDO::PARAM_STR);
			$consulta->bindValue(':pdescripcion',$descripcion,PDO::PARAM_STR);
			$consulta->bindValue(':ppreciounitario',$preciounitario,PDO::PARAM_STR);
			$consulta->bindValue(':pfoto',$foto,PDO::PARAM_STR);
			return $consulta->execute();
	 }
	
  
	 public function InsertarProducto($nombre,$descripcion,$preciounitario,$foto)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
					INSERT into producto (nombre,descripcion,preciounitario,foto)
					                       values 
					                       (:pnombre,:pdescripcion,:ppreciounitario,:pfoto)");
				$consulta->bindValue(':pnombre',$nombre,PDO::PARAM_STR);
				$consulta->bindValue(':pdescripcion',$descripcion,PDO::PARAM_STR);
				$consulta->bindValue(':ppreciounitario',$preciounitario,PDO::PARAM_STR);
				$consulta->bindValue(':pfoto',$foto,PDO::PARAM_STR);
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();			
	 }

  }

?>  
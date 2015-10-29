<?php
class provincia
  { 
   	 public $id;
     public $provincia;

     public static function TraerTodasLasProvincias()
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from provincias");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "provincia");		
		}

	 public static function TraerUnaProvincia($id)
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from provincias where id = :pid");
			$consulta->bindValue(':pid',$id,PDO::PARAM_INT);
			$consulta->execute();			
			$provinciaBuscada = $consulta->fetchObject('provincia');
			return $provinciaBuscada;	
		}	
  }

?>  
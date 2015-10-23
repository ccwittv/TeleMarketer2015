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
  }

?>  
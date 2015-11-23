<?php
class admintelem2015
{
	  private $id;
 	  private $nombre;
  	private $apellido;
    private $sexo;
    private $idprovincia;
    private $localidad;
    private $domicilio;
    private $fechaingreso;
  	private $mail;
  	private $clave;
    private $foto;
    private $rol;

    public static function TraerMailAdminTelem2015($rol)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where rol= :prol");            
            $consulta->bindValue(':prol',$rol,PDO::PARAM_STR);
            $consulta->execute();         
            $adminBuscado = $consulta->fetchObject('admintelem2015');             
            return $adminBuscado->mail; 
     }  

    public static function TraerPassAdminTelem2015($rol)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where rol= :prol");            
            $consulta->bindValue(':prol',$rol,PDO::PARAM_STR);
            $consulta->execute();         
            $adminBuscado = $consulta->fetchObject('admintelem2015');             
            return $adminBuscado->clave; 
     }

     public static function TraerNombreAdminTelem2015($rol)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where rol= :prol");            
            $consulta->bindValue(':prol',$rol,PDO::PARAM_STR);
            $consulta->execute();         
            $adminBuscado = $consulta->fetchObject('admintelem2015');             
            return $adminBuscado->nombre; 
     }

      public static function TraerApellidoAdminTelem2015($rol)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where rol= :prol");            
            $consulta->bindValue(':prol',$rol,PDO::PARAM_STR);
            $consulta->execute();         
            $adminBuscado = $consulta->fetchObject('admintelem2015');             
            return $adminBuscado->apellido; 
     }       

}
?>
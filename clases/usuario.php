<?php
//La clase usuario se utiliza para toda persona que se ingresa a telemarketer2015.tuars.net tanto sea supervisor como vendedor
class usuario
{
	  public $id;
 	  public $nombre;
  	public $apellido;
  	public $mail;
  	public $clave;
    public $foto;

   public static function validarUsuario($usuario,$clave)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where mail=:pusuario and clave=:pclave");            
            $consulta->bindValue(':pusuario',$usuario,PDO::PARAM_STR);
            $consulta->bindValue(':pclave',$clave,PDO::PARAM_STR);
            $consulta->execute();         
            $usuarioBuscado = $consulta->fetchObject('usuario');             
            return $usuarioBuscado; 
     } 

    public static function TraerUnUsuario($usuario)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where mail=:pusuario");            
            $consulta->bindValue(':pusuario',$usuario,PDO::PARAM_STR);
            $consulta->execute();         
            $usuarioBuscado = $consulta->fetchObject('usuario');             
            return $usuarioBuscado; 
     }  

}   
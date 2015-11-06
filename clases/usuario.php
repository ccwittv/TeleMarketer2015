<?php
//La clase usuario se utiliza para toda persona que se ingresa a telemarketer2015.tuars.net tanto sea supervisor como vendedor
class usuario
{
	public $id;
 	public $nombre;
  	public $apellido;
    public $sexo;
    public $idprovincia;
    public $localidad;
    public $domicilio;
    public $fechaingreso;
  	public $mail;
  	public $clave;
    public $foto;
    public $rol;

   public static function validarUsuario($usuario,$clave)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where mail=:pusuario and clave=:pclave");            
            $consulta->bindValue(':pusuario',$usuario,PDO::PARAM_INT);
            $consulta->bindValue(':pclave',$clave,PDO::PARAM_STR);
            $consulta->execute();         
            $usuarioBuscado = $consulta->fetchObject('usuario');             
            return $usuarioBuscado; 
     } 

    public static function TraerUnUsuarioMail($mail)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where mail=:pmail");            
            $consulta->bindValue(':pmail',$mail,PDO::PARAM_STR);
            $consulta->execute();         
            $usuarioBuscado = $consulta->fetchObject('usuario');             
            return $usuarioBuscado; 
     }  
    
    public static function TraerUnUsuario($id)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where id=:pid");            
            $consulta->bindValue(':pid',$id,PDO::PARAM_INT);
            $consulta->execute();         
            $usuarioBuscado = $consulta->fetchObject('usuario');             
            return $usuarioBuscado; 
     }  

}   
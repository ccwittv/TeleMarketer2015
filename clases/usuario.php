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
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where mail='$usuario' and clave='$clave'");            
            $consulta->execute();         
            $usuarioBuscado = $consulta->fetchObject('usuario');             
            return $usuarioBuscado; 
     } 

}   
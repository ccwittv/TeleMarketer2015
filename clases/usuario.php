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


    public function InsertarUsuario($nombre,                         
                                    $apellido,
                                    $sexo,
                                    $idprovincia,
                                    $localidad,
                                    $domicilio,
                                    $fechaingreso,
                                    $mail,
                                    $clave,
                                    $foto,
                                    $rol)
     {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario 
                                                          (nombre, apellido, sexo, idprovincia, localidad, domicilio, fechaingreso, mail, clave, foto, rol) 
                                                          values 
                                                          (:pnombre, :papellido, :psexo, :pidprovincia, :plocalidad, :pdomicilio, :pfechaingreso, :pmail, :pclave, :pfoto, :prol)");
          $consulta->bindValue(':pnombre',$nombre,PDO::PARAM_STR);          
          $consulta->bindValue(':papellido',$apellido,PDO::PARAM_STR);
          $consulta->bindValue(':psexo',$sexo,PDO::PARAM_STR);
          $consulta->bindValue(':pidprovincia',$idprovincia,PDO::PARAM_STR);
          $consulta->bindValue(':plocalidad',$localidad,PDO::PARAM_STR);
          $consulta->bindValue(':pdomicilio',$domicilio,PDO::PARAM_STR);
          $consulta->bindValue(':pfechaingreso',$fechaingreso,PDO::PARAM_STR);
          $consulta->bindValue(':pmail',$mail,PDO::PARAM_STR);
          $consulta->bindValue(':pclave',$clave,PDO::PARAM_STR);
          $consulta->bindValue(':pfoto',$foto,PDO::PARAM_STR);
          $consulta->bindValue(':prol',$rol,PDO::PARAM_STR);
          $consulta->execute();
          return $objetoAccesoDato->RetornarUltimoIdInsertado();      
     }  

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
<?php
//La clase usuario se utiliza para toda persona que se ingresa a telemarketer2015.tuars.net tanto sea supervisor como //vendedor
class resetkey
  {
	  public $id;
 	  public $idusuario;
  	public $mail;
    public $token;
    public $creado;    

    public static function InsertarReset( $idusuario,
                                   $mail,
                                   $token,
                                   $creado)
     {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into tblreseteopass 
                                                          (idusuario, mail, token, creado)
                                                          values 
                                                          (:pidusuario, :pmail, :ptoken, :pcreado)");
          $consulta->bindValue(':pidusuario',$idusuario,PDO::PARAM_INT);          
          $consulta->bindValue(':pmail',$mail,PDO::PARAM_STR);
          $consulta->bindValue(':ptoken',$token,PDO::PARAM_STR);
          $consulta->bindValue(':pcreado',$creado,PDO::PARAM_STR);          
          $consulta->execute();
          return $objetoAccesoDato->RetornarUltimoIdInsertado();      
     } 

   public static function TraerUnTokenId($id)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from tblreseteopass where id=:pid"); 
            $consulta->bindValue(':pid',$id,PDO::PARAM_INT);
            $consulta->execute();         
            $tokenBuscado = $consulta->fetchObject('resetkey');             
            return $tokenBuscado; 
     }     

   public static function TraerUnToken($token)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from tblreseteopass where token=:ptoken"); 
            $consulta->bindValue(':ptoken',$token,PDO::PARAM_STR);
            $consulta->execute();         
            $tokenBuscado = $consulta->fetchObject('resetkey');             
            return $tokenBuscado; 
     }       

   public function BorrarToken($token)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM tblreseteopass WHERE token = :ptoken"); 
            $consulta->bindValue(':ptoken',$token,PDO::PARAM_STR);
            return $consulta->execute();                     
     }         

  } 
  
?>  
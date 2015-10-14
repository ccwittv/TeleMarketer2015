<?php
class voto
{
	public $id;
 	public $dni;
  	public $provincia;
  	public $candidato;
  	public $sexo;
    public $localidad;
    public $direccion;

  	public function Borrarvoto()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL Borrarvoto($this->id)");
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	/*public static function BorrarvotoPorcandidato($candidato)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from votos 				
				WHERE candidato=:candidato");	
				$consulta->bindValue(':candidato',$candidato, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }*/
	public function Modificarvoto()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				CALL Modificarvoto('$this->id', '$this->candidato','$this->provincia', '$this->sexo', '$this->localidad', '$this->direccion')");
			return $consulta->execute();

	 }
	
  
	 public function InsertarElvoto()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
					CALL InsertarElvoto('$this->dni','$this->candidato','$this->provincia','$this->sexo', '$this->localidad', '$this->direccion')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }
	 public function Guardarvoto()
	 {

	 	if($this->id>0)
	 		{
	 			$this->Modificarvoto();
	 		}else {
	 			$this->InsertarElvoto();
	 		}

	 }


  	public static function TraerTodoLosvotos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodoLosvotos()");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "voto");		
	}

	public static function TraerUnvoto($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnvoto('$id')");
			$consulta->execute();
			$votoBuscado= $consulta->fetchObject('voto');
			return $votoBuscado;				

			
	}

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->dni."  ".$this->provincia."  ".$this->candidato;
	}

}
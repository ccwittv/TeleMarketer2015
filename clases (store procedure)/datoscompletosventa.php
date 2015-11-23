<?php
require_once("clases/venta.php");
require_once("clases/producto.php");
require_once("clases/cliente.php");
require_once("clases/provincia.php");
require_once("clases/usuario.php");
class datoscompletosventa
	{	
		public $id;
		public $idproducto;
		public $nombreproducto;
		public $descripcionproducto;
		public $preciounitarioproducto;
	    public $cantidad;
	    public $formadepago;
		public $fechaventa;
		public $idcliente;
		public $dnicliente;
		public $fechanacimientocliente;
		public $sexocliente;
		public $apeynomcliente;
		public $idprovinciacliente;
		public $provinciacliente;
		public $localidadcliente;
		public $domiciliocliente;
		public $tcelularcliente;
		public $mailcliente;
		public $tfijocliente;
		public $ttrabajocliente;
		public $idusuario;
		public $nombreusuario;
		public $apellidousuario;
		public $sexousuario;
		public $mailusuario;

		public static function TraerUnaVentaCompleta($id)
		{				
				$ventaBuscada=venta::TraerUnaVenta($id);
				$productoBuscado=producto::TraerUnProducto($ventaBuscada->idproducto);
				$clienteBuscado=cliente::TraerUnCliente($ventaBuscada->idcliente);
				$provinciaClienteBuscada=provincia::TraerUnaProvincia($clienteBuscado->idprovincia);
				$usuarioBuscado=usuario::TraerUnUsuario($ventaBuscada->idusuario);
				$provinciaUsuarioBuscada=provincia::TraerUnaProvincia($usuarioBuscado->idprovincia);
				$ventaCompletaBuscada=new datoscompletosventa();
				$ventaCompletaBuscada->id = $ventaBuscada->id;
				$ventaCompletaBuscada->idproducto = $ventaBuscada->idproducto;
				$ventaCompletaBuscada->nombreproducto = $productoBuscado->nombre;
				$ventaCompletaBuscada->descripcionproducto = $productoBuscado->descripcion;
				$ventaCompletaBuscada->preciounitarioproducto = $productoBuscado->preciounitario;
			    $ventaCompletaBuscada->cantidad = $ventaBuscada->cantidad;
			    $ventaCompletaBuscada->formadepago = $ventaBuscada->formadepago;
				$ventaCompletaBuscada->fechaventa = $ventaBuscada->fechaventa;
				$ventaCompletaBuscada->idcliente = $ventaBuscada->idcliente;
				$ventaCompletaBuscada->dnicliente = $clienteBuscado->dni;
				$ventaCompletaBuscada->fechanacimientocliente = $clienteBuscado->fechanacimiento;
				$ventaCompletaBuscada->sexocliente = $clienteBuscado->sexo;
				$ventaCompletaBuscada->apeynomcliente = $clienteBuscado->apeynom;
				$ventaCompletaBuscada->idprovinciacliente = $clienteBuscado->idprovincia;
				$ventaCompletaBuscada->provinciacliente = $provinciaClienteBuscada->provincia;
				$ventaCompletaBuscada->localidadcliente = $clienteBuscado->localidad;
				$ventaCompletaBuscada->domiciliocliente = $clienteBuscado->domicilio;
				$ventaCompletaBuscada->tcelularcliente  = $clienteBuscado->tcelular;
				$ventaCompletaBuscada->mailcliente = $clienteBuscado->mail;
				$ventaCompletaBuscada->tfijocliente = $clienteBuscado->tfijo;
				$ventaCompletaBuscada->ttrabajocliente = $clienteBuscado->ttrabajo;
				$ventaCompletaBuscada->idusuario = $ventaBuscada->idusuario;
				$ventaCompletaBuscada->nombreusuario = $usuarioBuscado->nombre;
				$ventaCompletaBuscada->apellidousuario = $usuarioBuscado->apellido;
				$ventaCompletaBuscada->sexousuario = $usuarioBuscado->sexo;
				$ventaCompletaBuscada->mailusuario = $usuarioBuscado->mail;
				
				return $ventaCompletaBuscada;	
		}
	}	

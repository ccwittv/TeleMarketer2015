<?php
if(!defined("SPECIALCONSTANT")) die("Acceso denegado");
// var_dump($app);

// GET: Para consultar y leer recursos
// POST: Para crear recursos
// PUT: Para editar recursos
// DELETE: Para eliminar recursos

// GET: Para consultar y leer recursos

//Cada uno de estos métodos es una función que ya está predeterminado en slim. El slim hace el app->run que está en ws/index.php. Cuando entra en el index
// el objeto app va a verificar si recibe esto: "personas".
// Si le paso personas asi en limpio lo que hace es ir al método TraerTodasLasPersonas (store procedure) y lo que hace es cargar en $res la respuesta y 
// después responde con esa respuesta transformada en json. Recibe el parámetro //personas
//No se programó nada de esto , mirar el framework slim. Lo unico que voy a hacer es saber que si hago get le puedo pasar distintos parámetros y segun los 
// parámetros que le pase me va a devolver algo. Lo que devuelve es un json. Es lo mismo que lo que se hace con el traerclima.php. Nosotros al clima le pasabamos
// algo y nos devolvia el clima de esa ciudad
$app->get("/usuario/", function() use($app)
{
	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('select * from usuario where mail != "madafaka1999@gmail.com"');
	
	$sentencia->execute();
	$res = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($res));
});

$app->get("/usuario/:id", function($id) use($app)
{
	try{
		$cnn = Conexion::DameAcceso();
		$sentencia = $cnn->prepare('select * from usuario where id = ? and mail != "madafaka1999@gmail.com"');
		
		$sentencia->execute(array($id));
		$res = $sentencia->fetchAll(PDO::FETCH_OBJ);

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode($res));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

// POST: Para crear recursos
/*$app->post("/personas/", function() use($app)
{
	$nombre = $app->request->post("nombre");
	$dni = $app->request->post("dni");
	$apellido = $app->request->post("apellido");
	$foto = ($app->request->post("foto") != "")? $app->request->post("foto") : "pordefecto.png"; 
	// $foto = "pordefecto.png";
	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('CALL InsertarPersona (?,?,?,?)');
	
	
	$status = 200;
	if ($sentencia->execute(array($nombre, $apellido, $dni, $foto)))
		$res = array("rta" => true);	
	else{
		$res = array("rta" => false);
		$status = 500;
	}
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status($status);
	$app->response->body(json_encode(json_encode($res)));
});


// PUT: Para editar recursos
$app->put("/personas/", function() use($app)
{
	$nombre = $app->request->put("nombre");
	$id = $app->request->put("id");
	$apellido = $app->request->put("apellido");
	$foto = $app->request->put("foto");

	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('CALL ModificarPersona(?,?,?,?)');
	$status = 200;
	if ($sentencia->execute(array($id, $nombre, $apellido, $foto)))
		$res = array("rta" => true);	
	else{
		$res = array("rta" => false);
		$status = 500;
	}
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status($status);
	$app->response->body(json_encode($res));
});
// DELETE: Para eliminar recursos
$app->delete("/personas/:id", function($id) use($app)
{
	try{
		$cnn = Conexion::DameAcceso();
		$sentencia = $cnn->prepare('CALL BorrarPersona(?)');
		
		$sentencia->execute(array($id));

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("res" => 111)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});*/
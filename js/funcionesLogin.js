function validarLogin()
{
		var varCorreo=$("#correo").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');

$("#sidebar").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"php/validarLogin.php",
		type:"post",
		data:{
			usuario:varCorreo,
			clave:varClave,
			recordarme:recordar,
		}
	});


	funcionAjax.done(function(retorno){
		//alert(retorno);
		if(retorno.trim()=="ingreso")
			{	
				//MostarLogin();
				$("#MensajeError").val("Ingreso Correcto");
				//Mostrar('CargarVenta');
				location.href = 'index_empleados.php';				
			}
        else if (retorno.trim()=="No registrado")
        	{
				//MostarLogin();
				$("#MensajeError").val("Usuario o contraseña no válida... ");
        	}
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
		$("#botonesABM").html(":(");
		$("#sidebar").html(retorno.responseText);	
	});
	
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarBotones();
			//MostrarLogin("MostrarLogin");
			location.href = 'index.php';
	});	
}
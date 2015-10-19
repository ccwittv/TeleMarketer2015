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
		alert(retorno);
		if(retorno.trim()=="ingreso")
			{	
				Mostrar('votacion');
				//MostarLogin();
			}
        else
        	{
				MostarLogin();
        	}
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#sidebar").html(retorno.responseText);	
	});
	
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearDni.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarBotones();
			MostarLogin();
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
		//$("#sidebar").html("Correcto BOTONES!!!");	
	});
}

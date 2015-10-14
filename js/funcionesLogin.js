function validarLogin()
{
		var varDni=$("#dni").val();
		var recordar=$("#recordarme").is(':checked');

$("#sidebar").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"php/validarDni.php",
		type:"post",
		data:{
			recordarme:recordar,
			dni:varDni,
		}
	});


	funcionAjax.done(function(retorno){
			if(retorno.trim()=="ingreso"){	
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

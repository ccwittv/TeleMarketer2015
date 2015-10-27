function Borrarvoto(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarVoto",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function Editarvoto(idParametro)
{
    Mostrar('MostrarFormAlta');
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerVoto",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		var voto =JSON.parse(retorno);		
		$("#id").val(voto.id);
		$("#provincia").val(voto.provincia);
        $("#localidad").val(voto.localidad);
        $("#direccion").val(voto.direccion);
		$("#candidato").val(voto.candidato);
        if(voto.sexo == "F")
             $('input:radio[name="sexo"][value="F"]').prop('checked', true);
        else
            $('input:radio[name="sexo"][value="M"]').prop('checked', true);	
        
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);	
	});
	
}

function VerEnMapa(prov, dire, loc, id)
{
    //alert(prov + dire +  loc);
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    console.log(punto);
    var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"VerEnMapa"
		}
	});
    funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
        $("#punto").val(punto);
        $("#id").val(id);
	Geolocalizacion.Marcador.iniciar();
	Geolocalizacion.Marcador.verMarcador();	
	});
}

function GuardarVenta()
{
        
        var id = $("#id").val()
		var producto=$("#producto").val();
		var cantidad=$("#cantidad").val();
		var formadepago=$('input:radio[name=formaspago]:checked').val();
		
        var fecha = new Date();
		var fechaventa= fecha.getFullYear() + "-" + (fecha.getMonth() +1) + "-" + fecha.getDate();
		
		var provincia=$("#provincia").val();
        var localidad=$("#localidad").val();
        var domicilio=$("#domicilio").val();
		var sexo=$('input:radio[name=sexo]:checked').val();
		var dni=$("#dni").val();
		var apeynom=$("#apellidonombre").val();

		var tcelular = null;
		var mail = null;
		var tfijo = null;
		var ttrabajo = null;

		if ($("#telefonocelular").is(':checked'))
			{
				tcelular=$("#tcelular").val();				
			}

		if ($("#correoelectronico").is(':checked'))
			{
				mail=$("#mail").val();				
			}	

		if ($("#telefonofijo").is(':checked'))
			{
				tfijo=$("#tfijo").val();				
			}		

		if ($("#telefonotrabajo").is(':checked'))
			{
				ttrabajo=$("#ttrabajo").val();				
			}			

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
				queHacer:"GuardarVenta",
				id:id,
				producto:producto,
            	cantidad:cantidad,
            	formadepago:formadepago,
				fechaventa:fechaventa,
            	provincia:provincia,
            	localidad:localidad,
            	domicilio:domicilio,
            	sexo:sexo,
            	dni:dni,
            	apeynom:apeynom,
            	tcelular:tcelular,
            	mail:mail,
            	tfijo:tfijo,
            	ttrabajo:ttrabajo
			 }
			});
		funcionAjax.done(function(retorno)
			{
		      Mostrar('CargarVenta');
		      alert(retorno);
			});
		funcionAjax.fail(function(retorno)
			{	
  			  alert(retorno);			  
			});	
}

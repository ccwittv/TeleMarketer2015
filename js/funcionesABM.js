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

function GuardarVoto()
{
        var id = $("#id").val()
		var candidato=$("#candidato").val();
		var provincia=$("#provincia").val();
        var localidad=$("#localidad").val();
        var direccion=$("#direccion").val();
		var sexo=$('input:radio[name=sexo]:checked').val();
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"GuardarVoto",
			candidato:candidato,
			provincia:provincia,
            localidad:localidad,
            direccion: direccion,
			sexo:sexo,
            id: id
		}
	});
	funcionAjax.done(function(retorno){
		//alert(retorno);
			deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		//alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}

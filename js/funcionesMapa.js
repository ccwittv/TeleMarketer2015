function VerEnMapa(prov, dire, loc, id, dni, fechanacimiento, sexo, apeynom, tcelular, mail, tfijo, ttrabajo)
{
    //alert(prov + dire +  loc);
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    console.log(punto);
    var unCliente = "Nro. cliente: "+id+", "+ "DNI: "+dni+", "+"Fecha Nac.: "+fechanacimiento+", "+"Sexo: "+sexo+", "+
    				"Apellido y nombre: "+apeynom+", "+"Celular: "+tcelular+", "+"Correo: "+mail+", "+"Tel.fijo:"+tfijo+", "+
    				"Tel.trabajo: "+ttrabajo+", ";
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
        $("#id").val(unCliente);
	Geolocalizacion.Marcador.iniciar();	
	Geolocalizacion.Marcador.verMarcador();	
	//Geolocalizacion.displayMarkers(); 
	//Geolocalizacion.hacerRuta();
	});

}

function VerTodosEnMapa(listaclientes)
{
  //alert("ver todos en mapa");
  var funcionAjax=$.ajax({
									url:"nexo.php",
									type:"post",
									data:{
											queHacer:"TraerTodasLasProvincias",
										 }
								});
	      funcionAjax.done(function(retorno){
												//alert(retorno);
												var provincias =JSON.parse(retorno);
												for (var i=0; i<listaclientes.length; i++)
  													{
														var idprov = listaclientes[i].idprovincia;
														var provincia = provincias[idprov-1].provincia;
														var domicilio = listaclientes[i].domicilio;
														var localidad = listaclientes[i].localidad;
														//alert(provincia+domicilio+localidad+listaclientes[i].id+listaclientes[i].dni+listaclientes[i].fechanacimiento+listaclientes[i].sexo+listaclientes[i].apeynom+listaclientes[i].tcelular+listaclientes[i].mail+listaclientes[i].tfijo+listaclientes[i].ttrabajo);
														VerEnMapa(provincia,domicilio,localidad,listaclientes[i].id,listaclientes[i].dni,listaclientes[i].fechanacimiento,listaclientes[i].sexo,listaclientes[i].apeynom,listaclientes[i].tcelular,listaclientes[i].mail,listaclientes[i].tfijo,listaclientes[i].ttrabajo);
  													}
											});
}
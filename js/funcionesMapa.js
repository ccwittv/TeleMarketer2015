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
	});
}

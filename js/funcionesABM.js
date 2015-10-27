function BorrarProducto(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarProducto",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){		
		Mostrar("MostrarGrillaProductos");		
		alert(retorno);
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
	});	
}

function EditarProducto(idParametro)
{    
    Mostrar('MostrarFormAltaProducto');
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerProducto",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){		
		var producto =JSON.parse(retorno);		
		$("#id").val(producto.id);
		$("#nombre").val(producto.nombre);
        $("#descripcion").val(producto.descripcion);
        $("#preciounitario").val(producto.preciounitario);		        
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
	});
	
}

function GuardarProducto()
{
        var id = $("#id").val()
		var nombre=$("#nombre").val();
		var descripcion=$("#descripcion").val();
        var preciounitario=$("#preciounitario").val();        
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"GuardarProducto",
			id:id,
			nombre:nombre,
			descripcion:descripcion,
            preciounitario:preciounitario,
		}
	});
	funcionAjax.done(function(retorno){			
		//alert(retorno);
		Mostrar("MostrarGrillaProductos");						
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);		
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

function EditarCliente(idParametro)
{    
    Mostrar('CargarCliente');
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerUnCliente",
			idCliente:idParametro	
		}
	});
	funcionAjax.done(function(retorno){		
		//alert(retorno);
		var cliente =JSON.parse(retorno);		
		$("#id").val(cliente.id);
		$("#dni").val(cliente.dni);
        $("#fechanacimiento").val(cliente.fechanacimiento);
        switch (cliente.sexo)
        {
        	case 'M':
        		$("#sexom").attr('checked', true);      
        		break;
        	case 'F':
        		$("#sexof").attr('checked', true);
        		break;	
        	default:
				break;	
        }
        $("#apellidonombre").val(cliente.apeynom);	
        $("#apellidonombre").attr('disabled',false);
        $("#provincia").val(cliente.idprovincia);	
        $("#localidad").val(cliente.localidad);
        $("#localidad").attr('disabled',false);		  
        $("#domicilio").val(cliente.domicilio);
        $("#domicilio").attr('disabled',false);	
        $cadena = cliente.tcelular;
        $cadena = $cadena.trim();
        if ($cadena.length > 0)
         {
         	$("#telefonocelular").attr('checked', true);
         	$("#tcelular").val(cliente.tcelular);
         	$("#tcelular").attr('disabled', false);
         } 	
        $cadena = cliente.mail;
        $cadena = $cadena.trim();
        if ($cadena.length > 0)
         {
         	$("#correoelectronico").attr('checked', true);
         	$("#mail").val(cliente.mail);
         	$("#mail").attr('disabled', false);
         } 	 
        $cadena = cliente.tfijo;
        $cadena = $cadena.trim();
        if ($cadena.length > 0)
         {
         	$("#telefonofijo").attr('checked', true);
         	$("#tfijo").val(cliente.tfijo);
         	$("#tfijo").attr('disabled', false);
         } 	
        $cadena = cliente.ttrabajo;
        $cadena = $cadena.trim();
        if ($cadena.length > 0)
         {
         	$("#telefonotrabajo").attr('checked', true);
         	$("#ttrabajo").val(cliente.ttrabajo);
         	$("#ttrabajo").attr('disabled', false);
         } 	   	      
	});

	funcionAjax.fail(function(retorno){
		alert(retorno);
	});
	
}

function BorrarCliente(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarCliente",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){		
		Mostrar("MostrarGrillaClientes");		
		//alert(retorno);
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
	});	
	funcionAjax.always(function(retorno){	
		//alert(retorno);		
	});	
}


function GuardarCliente()
{
        var id = $("#id").val()
		var dni=$("#dni").val();
		var fechanacimiento=$("#fechanacimiento").val();
		var sexo=$('input:radio[name=sexo]:checked').val();
		var apeynom=$("#apellidonombre").val();
        var idprovincia=$("#provincia").val();
        var localidad=$("#localidad").val();
        var domicilio=$("#domicilio").val();

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
			queHacer:"GuardarCliente",
			id:id,
			dni:dni,
			fechanacimiento:fechanacimiento,
			sexo:sexo,
			apeynom:apeynom,
            idprovincia:idprovincia,
            localidad:localidad,
            domicilio:domicilio,
            tcelular:tcelular,
            mail:mail,
            tfijo:tfijo,
            ttrabajo:ttrabajo
		}
	});
	funcionAjax.done(function(retorno){	
		//alert(retorno);		
		if (retorno.trim == "" )
		 {
		 	alert(retorno);
		 }	
		  
		Mostrar("MostrarGrillaClientes");						
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);		
	});
	funcionAjax.always(function(retorno){	
		//alert(retorno);		
	});		
}

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
	funcionAjax.always(function(retorno){	
		//alert(retorno);		
	});	
}

function EditarProducto(idParametro)
{    
    Mostrar('CargarProducto');
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
        //$("#fichero").attr('name',producto.foto); 
        $("#imagen").attr('src','Fotos/'+producto.foto);        
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
        var foto=$("#imagen").attr('src');  

        var files = $("#fichero").get(0).files;
        if (files[0] != null)
        	{
        		foto = files[0].name;
        		var accionFoto = 'nueva';
            }
        else
            {
            	foto = foto.replace("Fotos/", "");
            	if (foto == "")
            	 {
            		var accionFoto = 'noesta';		
            	 }
            	else
            	 {
            	 	var accionFoto = 'existe';
            	 } 	
            }    	
        	
    	/*var envio = new FormData();
	    for (var i = 0; i < files.length; i++) 
	    	{
	    		envio.append("fichero0", files[i]);
	    	}*/      

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
				queHacer:"GuardarProducto",
				id:id,
				nombre:nombre,
				descripcion:descripcion,
	            preciounitario:preciounitario,
	            foto:foto,
	            queHacerConLaFoto:accionFoto,
	            /*data:envio,
	            contentType: false,
	    		processData: false,
	    		/*cache: false,
            	dataType: "text"*/
			 }
	});
	funcionAjax.done(function(retorno){			
		//alert(retorno);
		Mostrar("MostrarGrillaProductos");						
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);		
	});	
	funcionAjax.always(function(retorno){	
		//alert(retorno);		
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
		var idcliente= $("#cliente").val();	

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
				idcliente:idcliente,
			 }
			});
		funcionAjax.done(function(retorno)
			{
		      alert(retorno);
		      Mostrar('CargarVenta');		      
			});
		funcionAjax.fail(function(retorno)
			{	
  			  alert(retorno);			  
			});	
		funcionAjax.always(function(retorno){	
		//alert(retorno);		
		});	
}

function EditarVenta(idParametro)
{    
    Mostrar('CargarVenta');
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerVenta",
			idVenta:idParametro	
		}
	});
	funcionAjax.done(function(retorno){		
		//alert(retorno);
		var ventaCompletaBuscada =JSON.parse(retorno);		
		$("#id").val(ventaCompletaBuscada.id);
		$("#producto").val(ventaCompletaBuscada.idproducto);
        $("#cantidad").val(ventaCompletaBuscada.cantidad);
        $("#precio").val(ventaCompletaBuscada.preciounitarioproducto);
        $preciototal = ventaCompletaBuscada.cantidad * ventaCompletaBuscada.preciounitarioproducto;
        $("#total").val($preciototal);	        
        switch (ventaCompletaBuscada.formadepago)
        {
        	case 'Transferencia o depósito':
        		$("#transferencia").attr('checked', true);
        		//$("#transferencia").val('true');		        
        		break;
        	case 'Otra forma de pago':
        		$("#otra").attr('checked', true);
        		//$("#otra").val('true');		        
        		break;	
        	default:
				break;	
        }         	        
        $("#cliente").val(ventaCompletaBuscada.idcliente);
        $("#fechanacimiento").val(ventaCompletaBuscada.fechanacimientocliente);	
        $("#sexo").val(ventaCompletaBuscada.sexocliente);
        $("#provincia").val(ventaCompletaBuscada.provinciacliente);
        $("#localidad").val(ventaCompletaBuscada.localidadcliente);
        $("#domicilio").val(ventaCompletaBuscada.domiciliocliente);		
        $("#tcelular").val(ventaCompletaBuscada.tcelularcliente);
        $("#mail").val(ventaCompletaBuscada.mailcliente);	
        $("#tfijo").val(ventaCompletaBuscada.tfijocliente);
        $("#ttrabajo").val(ventaCompletaBuscada.ttrabajocliente);						                					                
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
	});
	
}

function BorrarVenta(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarVenta",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){		
		Mostrar("MostrarGrillaVentas");		
		//alert(retorno);
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
	});	
	funcionAjax.always(function(retorno){	
		//alert(retorno);		
	});	
}

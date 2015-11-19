 
function renderLista(data) {
	
	var lista = data == null ? [] : (data instanceof Array ? data : [data]);
	
	$('#listaVendedores tr:not(:first)').remove();
	
	$.each(lista, function(index, usuario) {
				
		$('#listaVendedores').append("<tr><td>"+ usuario.nombre +"</td><td>"+ usuario.apellido + "</td><td>"+ usuario.id +"</td><td>"+ usuario.mail +"</td><td>"+ usuario.fechaingreso +"</td></tr>");				

	});
}

function cargar(){
		$.ajax({
	        type: "GET",
	        url: datos.urlLocal,
	        success: function(data, textStatus, jqXHR){
	        	alert("hola");
	            // console.log(data);
	            renderLista(data);
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            // console.log(errorThrown);
	            alert("No se pudo modificar " + errorThrown);
	        }
	    });
}
   		

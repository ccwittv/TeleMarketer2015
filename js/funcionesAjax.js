
function Mostrar(queMostrar)
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		//alert(retorno);
		$("#principal").html(retorno);
		//$("#sidebar").html("Correcto!!!");	
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
		//$("#principal").html(":(");
		//$("#sidebar").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

/*function MostrarLogin(queMostrar)
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
    $("#pagewrapCCW").html(retorno);
    //location.href = 'index.php';
		//$("#principal").html(retorno);
		//$("#sidebar").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
		//$("#botonesABM").html(":(");
		//$("#sidebar").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}*/

function cargarFoto(){
    var files = $("#fichero").get(0).files; // $("#fichero") slector por id de jquery  
    //var envio = new FormData();
    //var envio = new FormData($("#formProducto")[0]);
    var envio = new FormData();
    for (var i = 0; i < files.length; i++) {
    envio.append("fichero0", files[i]);
    }
    var promise = $.ajax
            ({
            type: "POST",
            url: "ajaxFoto.php",
            contentType: false,
    		processData: false,
            data: envio,
            cache: false,
            dataType: "text"
          });// fin del ajax
            
    // la funcion Ajax me devuelve una promesa de javascript, algo que va a hacerse. Cuando el servidor responde y si la respuesta del servidor es exitosa ingresa al done y ejecuta la función que se le pasa
    promise.done(function (dato){ 
                    //alert(dato);
                    $('#error').hide();
                    console.log(dato);
                    var strIndex = dato.indexOf('Error');
                    if(strIndex == -1) {
                        //string no encontrado
                        $('#imagen').attr("src", "FotosTemp/" + files[0].name);
                         $('#error').html("");
                    } else {
                        //string encontrado
                        $('#error').html(dato);
                        $('#error').show();
                        $('#imagen').attr("src", "");
                        $('#fichero').val("");
                    }
                       
    });

}

function TraerRSS(str_rss_ws)
        {
          
          var funcionAjax=$.ajax({ 
                                    url:"traerRSS.php",
                                    type:"post",
                                    data:{
                                            direccion_web:str_rss_ws
                                         }   
                                });
          funcionAjax.done(function(retorno){
              //alert(retorno);
              //document.getElementById("principal").value = "Solo se que no se nada";
                  $("#principal").html(retorno);
              });
          funcionAjax.fail(function(retorno){
                  alert(retorno);          
              });
          funcionAjax.always(function(retorno){
            //alert("siempre "+retorno.statusText);
          });
        }
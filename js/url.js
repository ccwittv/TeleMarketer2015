//si le pongo llaves es un objeto, es lo mismo que poner new object
var datos = {};

//aca se define una función igualada a datos. O sea que datos a partir de ahora empieza a ser la función. Y la funcion cuando se termina abajo se autoinvoca
//Al crearse se invoca (con el cierre de llaves la estoy invocando)
//Lo unico que se ve de datos es var url donde tiene urLocal y urlEsterna

datos = (function(){

	var _varPrivada = "hola";
	var local = "http://localhost/TeleMarketer2015/ws/usuario/";
	var externa = "http://localhost/TeleMarketer2015/ws/usuario/"
	
	var url = {
		urlLocal: local,
		urlExterna: externa
	};

	return url;
})();
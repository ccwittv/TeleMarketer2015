<!doctype html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <!-- disable iPhone inital scale -->
    <meta name="viewport" content=" initial-scale=1.0">

    <title>Telemarketer</title>

    <!-- main css -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/media-queries.css" rel="stylesheet" type="text/css">
    <link href="css/ingreso.css" rel="stylesheet">
    <link href="css/style_telemarketer2015.css" rel="stylesheet">

    <!-- media queries css -->
    <link rel="stylesheet" href="bower_components/bootstrap-css/css/bootstrap.min.css">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="icon" href="http://www.octavio.com.ar/favicon.ico">
    <script type="text/javascript" src="js/funcionesAjax.js"></script>
    <script type="text/javascript" src="js/funcionesLogin.js"></script>
    <script type="text/javascript" src="js/funcionesABM.js"></script>
    <script type="text/javascript" src="js/funcionesMapa.js"></script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
    <script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>
    <script type="text/javascript" src="js/geolocalizacionCommon.js"></script>
    
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
 </head>
 <body>
    <div id="pagewrap">
      <header id="header">
           <nav class="navbar navbar">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span> 
                </button>
                <!--<a class="navbar-brand" href="#">Telemarketer 2015</a>-->
              </div>
              <div class="collapse navbar-collapse"> <!--id="myNavbar">-->
                <ul class="nav">
                  <!--<li><a href="#" onclick="MostarLogin()" class="btn">Ingreso <br> (Login para sesión) </a></li>-->
                  <li><a href="#" class="btn">Cargas</a>
                    <ul> 
                      <li><a href="#" onclick="Mostrar('CargarVenta')" class="btn">Carga de VENTAS</a> </li>      
                      <li><a href="#" onclick="Mostrar('CargarCliente')" class="btn">Carga de CLIENTES</a> </li>
                      <li><a href="#" onclick="Mostrar('CargarProducto')" class="btn">Carga de PRODUCTOS <br> (Solo Supervisor)</a> </li>
                    </ul>
                  </li>  
                  <li><a href="#" class="btn">Listados</a>
                    <ul> 
                       <li><a href="#" onclick="Mostrar('MostrarGrillaVentas')" class="btn">Listado de VENTAS</a> </li>
                       <li><a href="#" onclick="Mostrar('MostrarGrillaClientes')" class="btn">Listado de CLIENTES</a> </li>
                       <li><a href="#" onclick="Mostrar('MostrarGrillaProductos')" class="btn">Listado de PRODUCTOS</a> </li>
                    </ul>   
                  </li>         
                  <li><a href="#" onclick="Mostrar('MostrarEstadisticasVentas')" class="btn">Estadísticas de Ventas <br> (Solo Supervisor) </a> </li>  
                  <li><a href="#" ><span class="glyphicon glyphicon-lock"></span> Cambiar Clave </a></li>
                  <li><a href="#" onclick="MostarLogin()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
              </div>
            </div>
          </nav>
                      
      <div id="content" style="width:980px"> 
          <article  class="post clearfix">    
            <div id="principal">
              <?php

              ?>
            </div>              
          </article>  
      </div>      

     </header>

    </div> 
 </body>
</html>

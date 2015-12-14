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
    
<!-- scripts para webservice-->
    <!--<script type="text/javascript" src="js/url.js"></script>
    <script type="text/javascript" src="js/controlGrilla.js"></script>-->
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
    <script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>
    <script type="text/javascript" src="js/geolocalizacionCommon.js"></script>
    
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

   <script type="text/javascript">
       
   </script>
 </head>

<?php session_start();
if(isset($_SESSION['registrado'])){  ?>
 <body>
    <div id="pagewrap">
      <header id="header">  
       <?php
        if($_SESSION['rol'] === "supervisor")
          {  ?> 
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
                    <li><a href="#" class="btn glyphicon glyphicon-floppy-saved"> Cargas</a>
                      <ul> 
                        <li><a href="#" onclick="Mostrar('CargarVenta')" class="btn">Carga de VENTAS</a> </li>      
                        <li><a href="#" onclick="Mostrar('CargarCliente')" class="btn">Carga de CLIENTES</a> </li>
                        <li><a href="#" onclick="Mostrar('CargarProducto')" class="btn">Carga de PRODUCTOS <br> (Solo Supervisor)</a> </li>
                      </ul>
                    </li>  
                    <li><a href="#" class="btn glyphicon glyphicon-list"> Listados</a>
                      <ul> 
                         <li><a href="#" onclick="Mostrar('MostrarGrillaVentas')" class="btn">Listado de VENTAS</a> </li>
                         <li><a href="#" onclick="Mostrar('MostrarGrillaClientes')" class="btn">Listado de CLIENTES</a> </li>
                         <li><a href="#" onclick="Mostrar('MostrarGrillaProductos')" class="btn">Listado de PRODUCTOS</a> </li>
                         <li><a href="#" onclick="Mostrar('MostrarListadoVendedores')" class="btn"> Listado Vendedores (WS) </a> </li>
                      </ul>   
                    </li>         
                    <li><a href="#" onclick="Mostrar('MostrarEstadisticasVentas')" class="btn glyphicon glyphicon-stats"> Estadísticas <br> (Solo Supervisor) </a> </li>
                    <li><a href="#" class="btn glyphicon glyphicon-list-alt"> Reportes <br> (Solo Supervisor) </a>
                      <ul> 
                        <li><a href="php/reporte_pdf.php" class="btn"><img src="imagenes/pdf.png" style='width:20px;height:20px;'/> PDF Ventas</a> </li>
                        <li><a href="php/reporte_excel.php" class="btn"><img src="imagenes/excel.png" style='width:20px;height:20px;'/> Excel Ventas</a> </li>    
                      </ul>
                    </li>
                    <li><a href="#" onclick="deslogear()"><span class="glyphicon glyphicon-log-out"></span> SALIR</a></li>
                  </ul>
                </div>
              </div>
            </nav>
        <?php }
        else if ($_SESSION['rol'] === "usuario")
        {  
          echo "<script>";
          echo "Mostrar('MostrarGrillaProductos')";
          echo "</script>";
        } ?>   
<!-- /#aside --> 
<!--    <aside id="sidebar"> -->    
<!--      <section id="seccion"> -->
<!--          <h4 class="widgettitle">Botones ABM</h4> -->
        <div id="botonesRSS" class="">
          <h5> Fuentes RSS </H5> 
             <!--contenido dinamico cargado por ajax-->
            <!--<button class='btn btn-danger' id="traerclima" name='traerclima' onclick='TraerRSS()'>Traer RSS o WS </button> 
            <input type="text" id="temperatura"> </input> -->
            <select onchange="TraerRSS(this.value)">
              <option value="">Seleccionar RSS:</option>
              <option value="http://www.cdmarket.com.ar/feeds/">CD Market</option>
              <option value="http://cdn01.am.infobae.com/adjuntos/163/rss/ahora.xml">Infobae</option>
              <option value="http://www.infodolar.com/blog/index.php/feed/">Info Dolar</option>
            </select>          
        </div>
<!--      </section>  -->
    <!-- /.widget -->            
<!--     </aside>  -->
  <!-- /#sidebar -->                                                        
      <!--<div id="content" style="width:980px"> -->
          <article  class="post clearfix">    
            <div id="principal">
              <?php
                //echo "Solo se que no se nada";
              ?>
            </div>              
          </article>  
      <!--</div>-->      

     </header>

    </div> 

 </body>
<?php }
  else
        { 
          header("location:index.php");
        } ?> 
</html>

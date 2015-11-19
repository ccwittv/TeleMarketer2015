<?php
require 'Slim/Slim.php'; //framework
require_once 'app/libs/Array2XML.php'; //transforma un array a xml
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

define("SPECIALCONSTANT", true);
require 'app/libs/connect.php';// es la forma de conectarse del webservice aparte del accesodatos
require 'app/routes/api.php';//es el enrutador
include_once '../clases/usuario.php';

$app->run();//esto quiere decir que a partir de este momento el objeto app existe
?>
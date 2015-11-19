<?php


if(isset($_FILES['fichero0']))
	{
		if(!$_FILES['fichero0']['error'])
		{
			//echo "cargó";
			//echo "<br>";
			$NOMEXT=explode(".", $_FILES['fichero0']['name']);
			$EXT=end($NOMEXT);
			$arrayDeExtValida = array("jpg", "jpeg", "gif", "bmp","png");  //defino antes las extensiones que seran validas

			if(!in_array($EXT, $arrayDeExtValida))
			{
			   echo "Error archivo de extension invalida";
			}
			else
			{
    			$tamanio=$_FILES['fichero0']['size'];
    			if($tamanio>1024000)
    			{
    				echo "Error: archivo muy grande!"."<br>";
    			}
    			else
    			{
    				
    			$ruta=getcwd();  //ruta directorio actual
    			//$ruta=$ruta."\\FotosTemp\\";
    			//Esto se hace debido a que cuando se sube a tuars no detecta la \\ como directorio
    			if ($_SERVER['SERVER_NAME'] == 'localhost' or $_SERVER['SERVER_NAME'] == 'localhost:8080' )
    				{
    					$ruta=$ruta."\\FotosTemp\\";
    				}
    			else
    				{
    					$ruta=$ruta."/FotosTemp/";
    				}
				
				//Se borra contenido directorio para limpiar de fotos de previws anteriores
    			$handle = opendir($ruta); 
                
				while ($file = readdir($handle))  
				{   
					if (is_file($ruta.$file)) 
					{ 
						unlink($ruta.$file); 
						
					}
				
				} 
    			
    			$nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
    			move_uploaded_file($_FILES['fichero0']['tmp_name'], $ruta.$nomarch);

    			echo  $ruta.$nomarch;
    			echo "<br>";
    			var_dump($_FILES);
    			}
			}
		}
		else
		{
			echo "Error: ".$_FILES['fichero0']['error'];
			echo "<br>";
		}
	}
	else
		echo "Error: No cargo archivo";

?>

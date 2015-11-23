<?php
$long_descripcion=100; 
$num_noticias=3; 
$n=0; 
//$noticias = simplexml_load_file('http://www.invbit.com/feed'); 
$noticias = simplexml_load_file('http://contenidos.lanacion.com.ar/herramientas/rss/origen=2');
foreach ($noticias as $noticia) {  
	foreach($noticia as $reg){ 
		if($reg->title!=NULL && $reg->title!='' && $reg->description!=NULL && $reg->description!='' && $n<$num_noticias){ 
			?> <div class="noticia"> <?php
			echo '<h4><a href="'.$reg->link.'" target="_blank">'.$reg->title.'</a></h4>'; 
			if(strlen($reg->description)>$long_descripcion) 
				echo '<p>'.substr($reg->description,0,$long_descripcion).'...</a></p>'; 
			else if ($reg->description==NULL || $reg->description==''){
			}
			else 
				echo '<p>'.$reg->description.'</p>'; 
			$n++; 
			?> </div><?php
		} 
	} 
}
?>
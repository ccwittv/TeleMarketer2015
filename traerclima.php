<?php
  $datos = simplexml_load_file('http://weather.service.msn.com/data.aspx?src=vista&weadegreetype=C&culture=es-ES&wealocations=wc:ARBA0107');
  echo $datos->weather->current['temperature'];

    /*$doc = simplexml_load_file('http://nosoloelectronica.wordpress.com/feed/'); 
    $items = $doc->channel->image; 
    foreach($items as $item)  
    { 
        echo "<pre>"; print_r($item); echo "</pre>"; 
    } */
    
?>
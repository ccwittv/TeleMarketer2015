<?php
   include_once('clases/simplepie/autoloader.php');
   include_once('clases/simplepie/idn/idna_convert.class.php');
   $feed = new SimplePie();  
   $feed->set_feed_url($_POST['direccion_web']);
   $feed->enable_cache(false);
   $feed->set_input_encoding($_POST['direccion_web']);
   $feed->enable_order_by_date(false);   
   //$feed->set_cache_location("cache");
   $feed->force_feed(true);
   $feed->init();
   $feed->handle_content_type();

	echo "<strong>".$feed->get_title()."</strong><br />
		 <em>".$feed->get_description()."</em><ul>";
	    
	    foreach ($feed->get_items() as $item) 
	     {

		    echo "<li>
		           <a href=".$item->get_link().">".$item->get_title()."</a><br />".$item->get_description().
		         "</li>";
	     }
	echo "</ul>"
?>
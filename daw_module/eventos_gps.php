<div id="html">
<?php
/* página invocada via ajax */

include 'webservice.php';

$ws = new Webservice();
$dados = $ws->pesquisaGps($_GET['lat'], $_GET['lon'], 10);


foreach ($dados->events as $e){
 
	if( isset($e->event) ){
		echo "<a href=\"evento?id=" . $e->event->id . "\">" . $e->event->title . "</a> - " . $e->event->distance . "<br>";
	}	
}
?>
</div>

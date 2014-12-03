<?php
if (isset($_GET['p'])) {
	$palavra = $_GET['p'];
} else {
	$palavra = "";
}
?>
<h1>Eventos - Pesquisa</h1>

<form action="eventos" method="get">
  Pesquisa: <input type="text" name="p" value="<?php print $palavra ?>" />  <input type="submit" value="Procurar" />
</form>
<br />
<?php
if ($content <> "") {

	foreach ($content->events as $e){
	 
		if (isset($e->event) ){
			echo "<a href=\"evento?id=" . $e->event->id . "\">" . $e->event->title . "</a><br>";
		}
	
	}
}
?>



<script language="JavaScript" type="text/javascript">

function gps(position) {
	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;

	$("#latitude").html(latitude);
	$("#longitude").html(longitude);
			
	
	$("#conteudo").load("http://localhost/drupal/sites/all/modules/daw_module/eventos_gps.php?lat="+ latitude +"&lon=" + longitude + "&?x=" + (new Date()).getTime() +"#html");
			
}

function erro(error) {
	alert("Geolocation error - code: " + error.code + " message : " + error.message);
}

		
$(document).ready(function(){			 
	if(Modernizr.geolocation) {
		$("#geolocation").html("é suportada.");
		load();
		navigator.geolocation.getCurrentPosition(gps, erro);

	} else {
		$("#geolocation").html("não é suportada.");
	}

});

function load() {
	$("#conteudo").empty().html('<img src="http://localhost/drupal/sites/all/modules/daw_module/imgs/ajax-loader.gif" />');           
} 


</script>

<h1>Eventos perto de si...</h1>

<b>Geolocalização</b>: <span id="geolocation"></span> <br />
<b>Latitude</b>: <span id="latitude"></span> <br />
<b>Longitude</b>: <span id="longitude"></span> <br />

<br/>

<div id="conteudo"></div>

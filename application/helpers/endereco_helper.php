<?php 
function endereco($lat, $lng)
{
	$c = 1;
	$script = "<script>";
	$script .= "var geocoder = new google.maps.Geocoder();";
	$script .= "var latlng = {lat: parseFloat(".$lat."), lng: parseFloat(".$lng.")}
	geocoder.geocode({'location': latlng}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			if (results[0]) {
				var endereco = results[0].formatted_address;
				$('#endereco".$c."').html(endereco);
				console.log(endereco);
				console.log(".$lat.", ".$lng.");
			};
		};
	})";
	$script .= "</script>";
	$c++;
echo $script;
}
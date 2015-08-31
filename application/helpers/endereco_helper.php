<?php 
function endereco($lat, $lng)
{
	$script = "<script>";
	$script .= "var geocoder = new google.maps.Geocoder();";
	$script .= "var latlng = {lat: parseFloat(".$lat."), lng: parseFloat(".$lng.")}
	geocoder.geocode({'location': latlng}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			if (results[1]) {
				var endereco = results[1].formatted_address;
				$('#endereco').html(endereco);
			};

			console.log(endereco);
		};
	})";
	$script .= "</script>";

echo $script;
}
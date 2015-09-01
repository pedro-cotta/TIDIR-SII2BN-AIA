'use strict'
var endereco = ' ';
function enderecos(lat, lng) 
{
	var geocoder = new google.maps.Geocoder();
	var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)}
	geocoder.geocode({'location': latlng}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			if (results[1]) {
				endereco = results[1].formatted_address;
			};
			console.log(latlng);
			console.log(endereco);
		};
	});
	return endereco;
} 
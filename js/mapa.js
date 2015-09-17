'use strict'
var map;
var directionsDisplay;
var markerInicial;
var options;
var geocoder = new google.maps.Geocoder();
var directionsService = new google.maps.DirectionsService();


function initialize() {
	directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
	var options = {
		zoom: 16,
		center: {lat: -19.918534, lng: -43.941391},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("mapa"), options);
	directionsDisplay.setMap(map);

	navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		};
		markerInicial.setPosition(pos);
		map.setCenter(pos);
		document.getElementById('inicial').value = "("+pos.lat+" "+pos.lng+")";

		var latlng = {lat: parseFloat(pos.lat), lng: parseFloat(pos.lng)}
		geocoder.geocode({'location': latlng}, function(results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
				if (results[1]) {
					var endereco = results[1].formatted_address;
				};
			};
		});
	});

	markerInicial = new google.maps.Marker({
		map: map,
		draggable: false,
		icon: 'img/markerInitial2.png',
		title: 'Posição Atual',
		animation:  google.maps.Animation.BOUNCE
	});

	console.log();

}
initialize();

'use strict'
var map;
var markerInicial;
var options;

function initialize() {

	var options = {
		zoom: 16,
		center: {lat: -19.918534, lng: -43.941391},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var geocoder = new google.maps.Geocoder();

	map = new google.maps.Map(document.getElementById("mapa"), options);

	navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		};
		markerInicial.setPosition(pos);
		map.setCenter(pos);

		//var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)}
		geocoder.geocode({'location': pos}, function(results, status) {
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

	var directionsService = new google.maps.DirectionsService;

	directionsDisplay.addListener('directions_changed', function() {
		computeTotalDistance(directionsDisplay.getDirections());
	});
	displayRoute('Perth, WA', 'Sydney, NSW', directionsService,
		directionsDisplay);
}
initialize();
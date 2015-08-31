'use strict'
var map;
var markerInicial;
var latlng;
var options;

function initialize() {

	console.log(latlng);

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
	});

	markerInicial = new google.maps.Marker({
		map: map,
		draggable: false,
		icon: 'img/markerInitial2.png',
		title: 'Posição Atual',
		animation:  google.maps.Animation.BOUNCE
	});
}
initialize();

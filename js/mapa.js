'use strict'
var map;
var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});;
var markerInicial;
var options;
var geocoder = new google.maps.Geocoder();
var directionsService = new google.maps.DirectionsService();
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {

	var options = {
		zoom: 14,
		center: {lat: -19.918534, lng: -43.941391},
		mapTypeId: google.maps.MapTypeId.TERRAIN
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
		document.getElementById('inicial').value = pos.lat+", "+pos.lng;

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

	
}
initialize();

function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
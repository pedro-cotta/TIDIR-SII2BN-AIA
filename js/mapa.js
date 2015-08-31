'use strict'
var map;
var markerInicial;
var posicao = new Array;

function initialize() {

	var latlng = new google.maps.LatLng(-19.923962, -43.938712);
	var options = {
		zoom: 16,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("mapa"), options);
	var geocoder = new google.maps.Geocoder();

	markerInicial = new google.maps.Marker({
		map: map,
		draggable: false,
		icon: 'img/markerInitial2.png',
		title: 'Posição Atual',
		animation:  google.maps.Animation.BOUNCE
	});

	markerInicial.setPosition(navigator.geolocation.getCurrentPosition());
	/*navigator.geolocation.getCurrentPosition(function(position){
		markerInicial.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
	});*/
//markerInicial.setPosition(latlng);

}
initialize();

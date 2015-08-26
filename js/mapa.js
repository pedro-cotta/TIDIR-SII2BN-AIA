'use strict'
var map;
var markerInicial;
var posicao = new Array;

function initialize() {

	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position){

			markerInicial.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
			posicao.push(position.coords.latitude);
			posicao.push(position.coords.longitude);
			console.log(posicao);
		}, 
		function(error){
			alert('Erro ao obter localização!');
			console.log('Erro ao obter localização.', error);
		});

		var latlng = new google.maps.LatLng(posicao[0], posicao[1]);
		var options = {
			zoom: 5,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("mapa"), options);
		var geocoder = new google.maps.Geocoder();
		markerInicial = new google.maps.Marker({
			map: map,
			draggable: true,
			icon: 'img/markerInitial.png',
		});

	} else {
		console.log('Navegador não suporta Geolocalização!');
	}

	

//markerInicial.setPosition(latlng);


}
initialize();

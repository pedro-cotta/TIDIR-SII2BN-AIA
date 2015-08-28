'use strict'
var map;
var markerInicial;
var posicao = new Array;

function initialize() {

try {
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

	} else {
		console.log('Navegador não suporta Geolocalização!');
	}

		navigator.geolocation.getCurrentPosition(function(pos){
		var latlng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
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

	});
	}
catch(err) {
    console.log("ERRO PORRA");
}

//markerInicial.setPosition(latlng);

}
initialize();

'use strict'
var map;
var markerInicial;
var latlng;
var batata;

function current(){
	navigator.geolocation.getCurrentPosition(function(position){
		latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		batata = "FODAS";
		});
	return latlng;
	}


function initialize() {
	 var yes = current();
			console.log(batata);
		
		var options = {
			zoom: 16,
			center: yes,
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
	

markerInicial.setPosition(latlng);

}
initialize();
 

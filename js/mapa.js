var map;

function initialize() {
	var latlng = new google.maps.LatLng(-19.928540, -43.937919);

	var options = {
		zoom: 17,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("mapa"), options);

	if (navigator.geolocation) {
   navigator.geolocation.getCurrentPosition(function (position)
      { var ponto = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      map.setCenter(ponto);
      map.setZoom(13);
   });
}

}
initialize();
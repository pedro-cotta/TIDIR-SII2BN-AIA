var map;

function initialize() {
	var latlng = new google.maps.LatLng(-19.928540, -43.937919);

	var options = {
		zoom: 17,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("mapa"), options);
}

initialize();

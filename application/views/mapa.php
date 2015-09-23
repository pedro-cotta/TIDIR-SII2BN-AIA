<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mapa Easy Park 2.2</title>
	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
</head>
<body>		
	<?php $this->load->view('nav');?>
	<div class="row">
		<div class="col-md-2 well col-md-offset-1">
			<h5 class="text-center">Filtrar por distância</h5>
			<span id="range">30KM</span>
			<input id="filtro" type="range" min="5" max="30" value="30" step="5" onchange="showValue(this.value)"/>
			
		</div>
	</div>

	<script type="text/javascript">
		function showValue(newValue)
		{
			document.getElementById("range").innerHTML=newValue+"KM";
		}
	</script>

	<div class="container">
		<div id="formularioMapa" class="row">
			<div id="mapa" class='center-block'></div>
		</div>
		<div id="traçarRota">
			<?php echo form_open() ?>
			<input id="inicial" value="">
			<input id="destino" value="">
			<?php echo form_button(array("id" => "trace-route","content" => "Traçar Rota","type" => "submit","class" => "btn btn-primary"));?>
			<?php echo form_close(); ?>
		</div>
	</div>
	<script src="js/markerclusterer.js"></script>
	<script src="js/infobox.js"></script>
	<script src="<?php echo base_url("js/mapa.js")?>"></script>
	<script src="<?php echo base_url ("js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url ("js/bootstrap.min.js");?>"></script>
	
	<script>
		function abrirInfoBox(id, marker) {
			if (typeof(idInfoBoxAberto) == 'string' && typeof(infoBox[idInfoBoxAberto]) == 'object') 
			{
				infoBox[idInfoBoxAberto].close();
			}

			infoBox[id].open(map, marker);
			idInfoBoxAberto = id;
		}

		function carregarPontos() {
			$.getJSON("<?php echo base_url('index.php/mapa/pegaPontos')?>", function(pontos) {
				var latlngbounds = new google.maps.LatLngBounds();

				$.each(pontos, function(index, ponto) {
					var pointB = ponto.latitude+" , "+ponto.longitude;

					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
						title: ponto.nome,
						icon: 'img/marker.png',
						map: map
					});

					var myOptions = {
						content:"<h5 class='text-center text-uppercase'><b>"+ponto.nome+"</h5></b>"+' '+"<p>"+ponto.descricao+"</p>",
						pixelOffset: new google.maps.Size(-150, 0)
					};

					infoBox[ponto.id] = new InfoBox(myOptions);
					infoBox[ponto.id].marker = marker;

					infoBox[ponto.id].listener = google.maps.event.addListener(marker, 'click', function (e) {
						abrirInfoBox(ponto.id, marker);
					});

					markers.push(marker);
					latlngbounds.extend(marker.position);

					$(document).ready(function () {
						google.maps.event.addListener(marker, 'click', function () {
							$('#destino').val(marker.position);
						});
					});
				});


				var markerCluster = new MarkerClusterer(map, markers);

			});
}carregarPontos();

function distancia(pointB){
	navigator.geolocation.getCurrentPosition(function(position) {
		var pointA = position.coords.latitude+" , "+position.coords.longitude;

		var r = 6371.0;

		var pointA_data = pointA.split(',');
		var pointB_data = pointB.split(',');

		pointA_lat = parseFloat(pointA_data[0]) * Math.PI / 180.0;
		pointA_lon = parseFloat(pointA_data[1]) * Math.PI / 180.0;

		pointB_lat = parseFloat(pointB_data[0]) * Math.PI / 180.0;
		pointB_lon = parseFloat(pointB_data[1]) * Math.PI / 180.0;

		diff_lat = pointB_lat - pointA_lat;
		diff_lon = pointB_lon - pointA_lon;

		var a = Math.sin(diff_lat / 2) * Math.sin(diff_lat / 2) + 
		Math.cos(pointA_lat) * Math.cos(pointB_lat) * 
		Math.sin(diff_lon / 2) * Math.sin(diff_lon / 2);

		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

		console.log(Math.round(r * c)+"KM");
	});
}

$("form").submit(function(event) {
	event.preventDefault();
	infoBox[idInfoBoxAberto].close();
	var enderecoPartida = $("#inicial").val();
	var enderecoChegada = $("#destino").val();

   var request = { //Novo objeto google.maps.DirectionsRequest, contendo:
      origin: enderecoPartida, //origem
      destination: enderecoChegada, //destino
      travelMode: google.maps.TravelMode.DRIVING //meio de transporte, nesse caso, de carro
  };

  directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) { // Se deu tudo certo
        directionsDisplay.setDirections(result); // Renderizamos no mapa o resultado
    }
});
});

$("#filtro").change(function(e){
	deleteMarkers();
	$.getJSON("<?php echo base_url('index.php/mapa/pegaPontos')?>", function(pontos) {
		var latlngbounds = new google.maps.LatLngBounds();
		var filtro = $("#range").text();

		$.each(pontos, function(index, ponto) {
			var pointB = ponto.latitude+" , "+ponto.longitude;

			distancia(pointB);

			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
				title: ponto.nome,
				icon: 'img/marker.png',
				map: map
			});

			var myOptions = {
				content:"<h5 class='text-center text-uppercase'><b>"+ponto.nome+"</h5></b>"+' '+"<p>"+ponto.descricao+"</p>",
				pixelOffset: new google.maps.Size(-150, 0)
			};

			infoBox[ponto.id] = new InfoBox(myOptions);
			infoBox[ponto.id].marker = marker;

			infoBox[ponto.id].listener = google.maps.event.addListener(marker, 'click', function (e) {
				abrirInfoBox(ponto.id, marker);
			});

			markers.push(marker);
			latlngbounds.extend(marker.position);

			$(document).ready(function () {
				google.maps.event.addListener(marker, 'click', function () {
					$('#destino').val(marker.position);
				});
			});
		});
		var markerCluster = new MarkerClusterer(map, markers);
	});
});
</script>
</body>
</html>

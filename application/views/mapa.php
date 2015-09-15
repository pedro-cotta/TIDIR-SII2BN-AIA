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
	<script src="<?php echo base_url ("js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url ("js/bootstrap.min.js");?>"></script>
	<script src="<?php echo base_url("js/mapa.js")?>"></script>
	<script>
		var idInfoBoxAberto;
		var infoBox = [];
		var markers = [];

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
}
carregarPontos();

/*$("form").submit(function(event) {


	directionDisplay = new google.maps.DirectionsRenderer();

	event.preventDefault();
	infoBox[idInfoBoxAberto].close();
	var enderecoPartida = $("#inicial").val();
	var enderecoChegada = $("#destino").val();

	var request = { 
		origin: enderecoPartida, 
		destination: enderecoChegada, 
		travelMode: google.maps.TravelMode.DRIVING
	};

	directionsService.route(request, function(result, status) {
		if (status == google.maps.DirectionsStatus.OK) {

			directionDisplay.setDirections(result);
		}
	});
});*/

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
</script>
</body>
</html>

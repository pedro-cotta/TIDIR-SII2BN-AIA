<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mapa Easy Park 2.2</title>
	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
</head>
<body>		
	<?php $this->load->view('nav');?>
	<div class="container">
		<div id="formularioMapa" class="row">
			<div id="mapa" class="col-md-12 well"></div>
		</div>
	</div>
	<script src="js/infobox.js"></script>
	<script src="<?php echo base_url ("js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url ("js/bootstrap.min.js");?>"></script>
	<script src="<?php echo base_url("js/mapa.js")?>"></script>

	<script>

		var idInfoBoxAberto;
		var infoBox = [];

		function abrirInfoBox(id, marker) {
			if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
				infoBox[idInfoBoxAberto].close();
			}

			infoBox[id].open(map, marker);
			idInfoBoxAberto = id;
		}

		function carregarPontos() {
			$.getJSON("<?php echo base_url('index.php/mapa/pegaPontos')?>", function(pontos) {
				$.each(pontos, function(index, ponto) {
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
						title: ponto.nome,
						icon: 'img/marker.png',
						map: map
					});

					var myOptions = {
						content:"<h3 class='text-center text-uppercase'>"+ponto.nome+"</h3>"+' '+ponto.descricao,
						pixelOffset: new google.maps.Size(-150, 0)
					};

					infoBox[ponto.id] = new InfoBox(myOptions);
					infoBox[ponto.id].marker = marker;

					infoBox[ponto.id].listener = google.maps.event.addListener(marker, 'click', function (e) {
						abrirInfoBox(ponto.id, marker);
					});

				});
			});
		}
		carregarPontos();

		/*$.ajax({
			url: "<?php echo base_url('index.php/mapa/pegaPontos')?>",
			dataType : 'json',
			success: function(data){
				for (var i = 0; i < data.length; i++) {
					coord = new google.maps.LatLng(data[i].latitude, data[i].longitude);
					console.log(data[i].latitude + ' '+data[i].longitude);
					marker = new google.maps.Marker({
					//icon: 'marker.png',
					position: coord,
					map: map
				});
					var infowindow = new google.maps.InfoWindow(), marker;
					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							infowindow.setContent("Conteúdo do marcador.");
							infowindow.open(map, marker);
						}
					})(marker))
				}
			}
		});*/
</script>
</body>
</html>
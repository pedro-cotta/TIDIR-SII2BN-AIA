<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mapa Easy Park 2.2</title>
	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
</head>
<body>		
	<div class="container">
		<div id="formularioMapa" class="row">
			<div id="mapa" class="col-md-12 well"></div>
		</div>
	</div>
	<script src="<?php echo base_url ("js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url ("js/bootstrap.min.js");?>"></script>	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="<?php echo base_url("js/mapa.js")?>"></script>
	<script>
		function carregarPontos() {
			$.getJSON("<?php echo base_url('index.php/mapa/pegaPontos')?>", function(pontos) {
				$.each(pontos, function(index, ponto) {
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
						title: ponto.nome,
						map: map
					});
					console.log(ponto.latitude +' '+ ponto.longitude);
					var infowindow = new google.maps.InfoWindow(), marker;

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							infowindow.setContent(ponto.nome);
							infowindow.open(map, marker);
						}
					})(marker))

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
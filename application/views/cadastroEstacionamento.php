<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro de Estacionamento</title>
	<link rel="stylesheet" href="<?php echo base_url("js/jquery-ui.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
</head>
<body>
	<?php $this->load->view('nav');?>
	<div class="container">
		<div id="formularioCadastro" class="row">
			<div class="col-md-4 well col-md-offset-4">
				<div class="col-md-10 col-md-offset-1">
					<h2 id="textoCadastro" class="text-center">Cadastro de Estacionamento</h2>
					<div>
						<?php if ($this->session->flashdata("sucesso")) {?>
						<p class="alert-success"><span class="glyphicon glyphicon-exclamation-sign"></span> Cadastro efetuado com secesso.</p>
						<?php }
						if ($this->session->flashdata("erro")) {?>
						<p class="alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Verifique as informações necessárias.</p>
						<?php } ?>
					</div>
					<?php echo form_open("estacionamentos/novoEstacionamento");?>
					<div class="form-group">
						<?php echo form_label("Nome","nome");?>
						<?php echo form_input(array("id" => "nome","name" => "nome","class" => "form-control"));?>
					</div>

					<div class="form-group">
						<?php echo form_label("Descrição","descricao");?>
						<?php echo form_input(array("id" => "descricao","name" => "descricao","class" => "form-control"));?>
					</div>

					<div class="form-group">
						<?php echo form_label("Endereço","endereco");?>
						<?php echo form_input(array("id" => "endereco","name" => "endereco","class" => "form-control"));?>
					</div>
					<div>
						<input id="latitude" name="latitude" type="hidden">
						<input id="longitude" name="longitude" type="hidden">
					</div>
					<?php echo form_button(array("content" => "Cadastrar","type" => "submit","class" => "btn btn-primary form-control"));?>
					<?php echo form_close() ?>
					<?php echo form_open("estacionamentos");?>
					<?php echo form_button(array("content" => "Voltar","type" => "submit","class" => "btn btn-link form-control"));?>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url("js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>
	<script src="<?php echo base_url("js/jquery-ui.custom.min.js");?>"></script>
	<script>
		var geocoder = new google.maps.Geocoder();
		$("#endereco").autocomplete({
			source: function (request, response) {
				geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
					response($.map(results, function (item) {
						return {
							label: item.formatted_address,
							value: item.formatted_address,
							latitude: item.geometry.location.lat(),
							longitude: item.geometry.location.lng()
						}
					}));
				})
			},
			select: function (event, ui) {
				var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
				document.getElementById('latitude').value = ui.item.latitude;
				document.getElementById('longitude').value = ui.item.longitude;
			}
		});
	</script>
</body>
</html>



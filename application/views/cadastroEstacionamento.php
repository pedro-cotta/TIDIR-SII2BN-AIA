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
						<p class="text-success"><span class="glyphicon glyphicon-exclamation-sign"></span> Cadastro efetuado com secesso.</p>
						<?php }
						if ($this->session->flashdata("erro")) {?>
						<p class="text-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Verifique as informações necessárias.</p>
						<?php } ?>
					</div>
					<?php echo form_open("estacionamentos/novoEstacionamento");?>
					<div class="form-group">
						<?php echo form_label("*Nome","nome");?>
						<?php echo form_input(array("id" => "nome","name" => "nome","class" => "form-control"));?>
					</div>

					<div id="boxCampos" class="form-group">
						<label>CEP</label>
						<?php echo form_input(array("id" => "cep","name" => "cep","class" => "form-control"));?>

						<label>*UF</label>
						<?php echo form_input(array("id" => "uf","name" => "uf","class" => "form-control"));?>

						<label>*Cidade</label>
						<?php echo form_input(array("id" => "cidade","name" => "cidade","class" => "form-control"));?>
						
						<label>*Bairro</label>
						<?php echo form_input(array("id" => "bairro","name" => "bairro","class" => "form-control"));?>

						<label>*Rua</label>
						<?php echo form_input(array("id" => "rua","name" => "rua","class" => "form-control"));?>

						<label>*Nº</label>
						<?php echo form_input(array("id" => "numero","name" => "numero","class" => "form-control"));?>

						<label>*Complemento</label>
						<?php echo form_input(array("id" => "complemento","name" => "complemento","class" => "form-control"));?>
						
						<?php echo form_input(array("id" => "endereco","name" => "endereco","class" => "form-control"));?>
					</div>

					<div class="form-group">
						<?php echo form_label("*Descrição","descricao");?>
						<?php echo form_textarea(array("id" => "descricao","name" => "descricao","rows" => "5","class" => "form-control"));?>
					</div>

					<div>
						<input id="coords" name="coords">
					</div>
					<?php echo form_button(array("id" => "cadastrar","content" => "Cadastrar","type" => "submit","class" => "btn btn-primary form-control"));?>
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

		$("#cep").bind('blur keyup change',function(e){
			var cep     = $(this).val();
			if(cep !== ""){
				var url = 'http://cep.correiocontrol.com.br/'+cep+'.json';
				$.getJSON(url, function(json){
					$("#rua").val(json.logradouro);
					$("#bairro").val(json.bairro);
					$("#cidade").val(json.localidade);
					$("#uf").val(json.uf);
					$("#numero").focus();
				}).fail(function(){
					console.log('CEP inexistente');
					$("#rua").val(" ");
					$("#bairro").val(" ");
					$("#cidade").val(" ");
					$("#uf").val(" ");
					$(this).focus();
				});

			}
		});

		$("#numero").bind('keyup change',function(e){
			var uf = $("#uf").val();
			var cidade = $("#cidade").val();
			var bairro = $("#bairro").val();
			var rua = $("#rua").val();
			var numero = $("#numero").val();
			$("#endereco").val(uf+","+cidade+","+bairro+","+rua+","+numero);
		});

		$("#descricao").bind('keyup blur change',function(e){
			var geocoder = new google.maps.Geocoder();
			var endereco = $('#endereco').val();
			geocoder.geocode({'address': endereco }, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) { 
						$('#coords').val(results[0].geometry.location);
					}
				};
			});
		});

	</script>
</body>
</html>



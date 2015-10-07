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
			<div class="col-md-10 well col-md-offset-1">

				<div class="text-right">
					<div class="btn-group">
						<span id="info" style='cursor:pointer;font-size:20px;margin-top:10px' class="glyphicon glyphicon-info-sign dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ></span>
						
						<ul class="dropdown-menu dropdown-menu-right">
							<h4 class="text-center">Informações</h4>
						</ul>
					</div>
				</div>

				<div class="col-md-12 col-md-offset-1">
					<h2 id="textoCadastro" class="row form-group col-md-offset-2">Cadastro de Estacionamento</h2>
					<div>
						<?php if ($this->session->flashdata("sucesso")) {?>
						<p class="text-success col-md-offset-2"><span class="glyphicon glyphicon-exclamation-sign"></span> Cadastro efetuado com secesso.</p>
						<?php }
						if ($this->session->flashdata("erro")) {?>
						<p class="text-danger col-md-offset-2"><span class="glyphicon glyphicon-exclamation-sign"></span> Verifique as informações necessárias.</p>
						<?php } ?>
					</div>
					<?php echo form_open("estacionamentos/novoEstacionamento");?>

					<div class="col-md-10 well">
						<?php echo form_label("Nome: ","nome");?>
						<?php echo form_input(array("id" => "nome","name" => "nome","class" => "form-control","value" => set_value('nome')));?>
						<?php echo form_error('nome'); ?>
					</div>

					<div class="form-group col-md-5" style="padding-left:0;">
						<label for="cep">CEP</label>
						<?php echo form_input(array("id" => "cep","name" => "cep","class" => "form-control","type" => "number","placeholder" => "Digite seu CEP, sem traços ou espaços","value" => set_value('cep')));?>
						<?php echo form_error('cep'); ?>
					</div>

					<div class="form-group col-md-5" style="padding-right:0;">
						<label for="uf">UF</label>
						<?php echo form_input(array("id" => "uf","name" => "uf","class" => "form-control","value" => set_value('uf')));?>
						<?php echo form_error('uf'); ?>
					</div>
					<div class=" form-group col-md-5" style="padding-left:0;">
						<label for="cidade">Cidade</label>
						<?php echo form_input(array("id" => "cidade","name" => "cidade","class" => "form-control","value" => set_value('cidade')));?>
						<?php echo form_error('cidade'); ?>
					</div>
					<div class="form-group col-md-5" style="padding-right:0;">
						<label form="bairro">Bairro</label>
						<?php echo form_input(array("id" => "bairro","name" => "bairro","class" => "form-control","value" => set_value('bairro')));?>
						<?php echo form_error('bairro'); ?>
					</div>
					<div class=" form-group col-md-4" style="padding-left:0;">
						<label form="rua">Rua</label>
						<?php echo form_input(array("id" => "rua","name" => "rua","class" => "form-control","value" => set_value('rua')));?>
						<?php echo form_error('rua'); ?>
					</div>
					<div class="form-group col-md-3">
						<label form="numero">Nº</label>
						<?php echo form_input(array("id" => "numero","name" => "numero","class" => "form-control","value" => set_value('numero')));?>
						<?php echo form_error('numero'); ?>
					</div>
					<div class="form-group col-md-3" style="padding-right:0;">
						<label form="complemento">Complemento</label>
						<?php echo form_input(array("id" => "complemento","name" => "complemento","class" => "form-control"));?>

						<?php echo form_input(array("id" => "endereco","name" => "endereco","class" => "form-control","type" => "hidden"));?>
					</div>
					<div class="col-md-10 well" id="preco">
						<h4 class="row">Preços</h4>

						<div class="col-md-3" style="padding:3px;">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">R$</span>
								<?= form_input(array('id'=>'15min','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1','placeholder'=>'15 Minutos')) ?>
							</div>
						</div>

						<div class="col-md-3" style="padding:3px;">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">R$</span>
								<?= form_input(array('id'=>'30min','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1','placeholder'=>'30 Minutos')) ?>
							</div>
						</div>

						<div class="col-md-3" style="padding:3px;">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">R$</span>
								<?= form_input(array('id'=>'hora','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1','placeholder'=>'1ª Hora')) ?>
							</div>
						</div>

						<div class="col-md-3" style="padding:3px;">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">R$</span>
								<?= form_input(array('id'=>'sHora','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1','placeholder'=>'Hora Subsequente')) ?>
							</div>
						</div>

						<div class="col-md-3" style="padding:3px;">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">R$</span>
								<?= form_input(array('id'=>'diaria','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1','placeholder'=>'Diária')) ?>
							</div>
						</div>

						<div class="col-md-3" style="padding:3px;">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">R$</span>
								<?= form_input(array('id'=>'pernoite','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1','placeholder'=>'Pernoite')) ?>
							</div>
						</div>
					</div>

					<div class="form-group col-md-10">
						<?php echo form_label("Descrição","descricao");?>
						<?php echo form_error('descricao'); ?>
						<?php echo form_textarea(array("id" => "descricao","name" => "descricao","rows" => "5","class" => "form-control","value" => set_value('descricao')));?>
						<div>
							<input id="coords" name="coords" type="hidden">
						</div>
					</div>

					<div class="form-group col-md-10">
						<?php echo form_button(array("id" => "cadastrar","content" => "Cadastrar","type" => "submit","class" => "btn btn-primary form-control"));?>
						<?php echo form_close() ?>
						<?php echo form_open("estacionamentos");?>
						<?php echo form_button(array("content" => "Voltar","type" => "submit","class" => "btn btn-link form-control"));?>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url("js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>
	<script src="<?php echo base_url("js/jquery-ui.custom.min.js");?>"></script>
	<script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('descricao',{ height: 200 });

		$("#cep").bind('blur keyup change',function(e){
			var cep = $('#cep').val().replace('-', '');
			if(cep !== ""){
				var url = 'http://cep.correiocontrol.com.br/'+cep+'.json';
				$.getJSON(url, function(json){
					$("#rua").val(json.logradouro);
					$("#bairro").val(json.bairro);
					$("#cidade").val(json.localidade);
					$("#uf").val(json.uf);
					$("#numero").focus();
				}).fail(function(){
					$("#rua").val("");
					$("#bairro").val("");
					$("#cidade").val("");
					$("#uf").val("");
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

		$("#numero").bind('keyup blur change',function(e){
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



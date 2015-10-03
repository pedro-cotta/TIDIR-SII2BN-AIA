<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Meus Estacionamentos</title>
	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
</head>
<body>		
	<?php $this->load->view('nav');?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-hover" id="table_original">
						<thead>
							<tr>
								<td>
									<?php if ($this->session->flashdata("sucesso")) {?>
									<p class="alert-success col-md-offset-2"><span class="glyphicon glyphicon-exclamation-sign"></span> Estacionamento Excluído com sucesso.</p>
									<?php }
									if ($this->session->flashdata("erro")) {?>
									<p class="alert-danger col-md-offset-2"><span class="glyphicon glyphicon-exclamation-sign"></span> Não foi possível excluir o Estacionamento desejado.</p>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td>Nome</td>
								<td>Descrição</td>
								<td>Endereço</td>
								<td>Preços</td>
							</tr>
						</thead>
						<tbody>
							<?php $c = 1; 
							foreach ($parks as $park) :
								$lat = $park['latitude'];
							$long = $park['longitude'];?>
							<tr>
								<td><?= $park["nome_park"]?></td>
								<td><?= $park["descricao"] ?></td>
								<td><?= $park["endereco"] ?></td>
								<td>
									<b>15 Minutos:</b> R$<?= str_replace(".",",",$park['15min']) ?><br>
									<b>30 Minutos:</b> R$<?= str_replace(",",",",$park['30min']) ?><br>
									<b>1ª Hora:</b> R$<?= str_replace(".",",",$park['phora']) ?><br>
									<b>Hora Subsequênte:</b> R$<?= str_replace(".",",",$park['Hsub']) ?><br>
									<b>Diária:</b> R$<?= str_replace(".",",",$park['diaria']) ?><br>
									<b>Pernoite:</b> R$<?= str_replace(".",",",$park['pernoite']) ?><br>
								</td>
								<td>
									<?= anchor("estacionamentos/editarEstacionamento?id={$park['id']}", "<span id='editar' class='text-right glyphicon glyphicon-pencil' style='cursor:pointer;font-size:25px;margin-top:10px'></span>"); ?>
									<br>
									<?= anchor("estacionamentos/excluirEstacionamento?id={$park['id']}", "<span id='excluir' class='text-right glyphicon glyphicon-trash' style='cursor:pointer;font-size:25px;margin-top:20px'></span>"); ?>
								</td>
							</tr>
							<?php
							endforeach; 
							?>
						</tbody>
					</table>
					<div style="float:right;">
						<?=anchor("estacionamentos/cadastroEstacionamento","Novo Estacionamento");?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url ("js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url ("js/bootstrap.min.js");?>"></script>
</body>
</html>
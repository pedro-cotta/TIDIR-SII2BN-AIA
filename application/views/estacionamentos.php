<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Meus Estacionamentos</title>
	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="<?php echo base_url("js/estacionamento.js")?>"></script>
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
								<td>Nome</td>
								<td>Descrição</td>
								<td>Endereço</td>
							</tr>
						</thead>
						<tbody>
							<?php $c = 1; 
							foreach ($parks as $park) :
							$lat = $park['latitude'];
							$long = $park['longitude'];?>
							<tr>
								<td><?= $park["nome"]?></td>
								<td><?=html_escape($park["descricao"]) ?></td>
								<td><?= $park["endereco"] ?></td>
							</tr>
							<?php $c++; 
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
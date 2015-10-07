<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TESTE</title>
	<link rel="stylesheet" href="<?php echo base_url("js/jquery-ui.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
</head>
<body>
	<div class="container">
		<h2 class='text-center' style="color:#d7ddda">INFOBOX DOS ESTACIONAMENTOS TESTE</h2>
		<?php foreach ($pontos as $ponto) {?>
		<div class='col-md-12' style='padding-top:50px;'>
			<div style='border: 2px solid #afb2b0;background-color:#d7ddda;' class='col-md-4 col-md-offset-4'>
				<div>
					<h4 class="text-center"><?= $ponto['nome_park'] ?></h4>
				</div>
				<div class='col-md-4'>
					<p><?= $ponto['descricao'] ?></p>
					<div class="col-md-3" style="padding:3px;">
						<h5>Preços</h5>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">15 Min:</span>
							<?= form_input(array('id'=>'hora','type'=>'disabled','class'=>'form-control','aria-describedby'=>'basic-addon1','placeholder'=>'1ª Hora')) ?>
						</div>
					</div>
				</div>
				<h6><?= $ponto['nome_usuario'] ?></h6>
			</div>
		</div>
		<?php } ?>
	</div>
</body>
</html>

<table class="table table-hover table-responsive" style='max-width:20px;overflow-x:auto;max-height: 200px;overflow-y:auto'>
	<thead>
		<tr>
			<td>15 Minutos: </td>
			<td>30 Minutos: </td>
			<td>1ª Hora: </td>
			<td>Hora Subsequênte: </td>
			<td>Diária: </td>
			<td>Pernoite: </td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>R$<?= str_replace(".",",",$ponto['15min']) ?></td>
			<td>R$<?= str_replace(",",",",$ponto['30min']) ?></td>
			<td>R$<?= str_replace(".",",",$ponto['phora']) ?></td>
			<td>R$<?= str_replace(".",",",$ponto['Hsub']) ?></td>
			<td>R$<?= str_replace(".",",",$ponto['diaria']) ?></td>
			<td>R$<?= str_replace(".",",",$ponto['pernoite']) ?></td>
		</tr>
	</tbody>
</table>
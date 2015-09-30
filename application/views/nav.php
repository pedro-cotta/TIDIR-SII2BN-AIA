
<nav class="navbar navbar-default">
	<div class="navbar-header">
		<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
			<span class="sr-only">Navegação</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="navbar-collapse collapse" id="navbar">
		<ul class="nav navbar-nav">
			<li><a class="navbar-brand" href="http://localhost/easypark/index.php">EasyPark</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					<span class="glyphicon glyphicon-cog"> </span><span class="caret"></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-left" role="menu">
					<li><?=anchor("estacionamentos","Meus Estacionamentos");?></li>
					<li><?=anchor("","Sair");?></li>
				</ul>
			</li>
		</ul>
		<form class="navbar-form navbar-left" role="search">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Insira a chave de busca">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-info"><span class='glyphicon glyphicon-search'></span></button>
				</span>
			</div>
		</form>

		<ul class="nav navbar-nav navbar-right">
			<li><button class="btn btn-link navbar-btn" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Login</button></li>
		</ul>
	</div>
</nav>


<div id="login" class="modal fade" role="dialog" style="padding-top:10%;">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Login</h4>
			</div>
			<?php echo form_open('usuarios/autenticar') ?>
			<div class="modal-body">
				<div style="margin-left: calc(50% - 131px);">
					<div class="">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Login</span>
							<?= form_input(array('name'=>'login','id'=>'login','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1')) ?>
						</div>
					</div>
					<div class="text-center" style="padding-top:3px;">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Senha</span>
							<?= form_input(array('name'=>'senha','id'=>'senha','type'=>'text','class'=>'form-control','aria-describedby'=>'basic-addon1')) ?>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div style="text-align:center">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Entrar</button>
				</div>
				<?php echo form_close() ?>
				<div style="text-align:center">
					<?php echo form_open('usuarios/esqueci') ?>
					<button type="button" class="btn btn-link" data-dismiss="modal">Esqueci minha Senha</button>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function pesquisa(){

	}
</script>
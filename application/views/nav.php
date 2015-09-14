
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
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Pesquisar">
			</div>
			<button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	</div>
</nav>
<script>
	function pesquisa(){
		
	}
</script>
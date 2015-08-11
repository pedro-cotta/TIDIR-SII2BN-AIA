	<nav class="navbar navbar-inverse">
		<div class="container">
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
					<li><?=anchor("","...");?></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"> </span> Configurações <span class="caret"></span></a>
						<ul class="dropdown-menu dropdown-menu-left" role="menu">
							<li><?=anchor("","Meus Dados");?></li>
							<li><?=anchor("","Sair");?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
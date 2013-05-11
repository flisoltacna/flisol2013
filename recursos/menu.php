<?php function menu($activo){ ?>
	<!-- menu -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" style="color:#fff" href="#">Flisol 2013</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="#">Home</a></li>
						<li <?php if($activo == 'publicaciones'){ echo 'class="active"'; } ?>>
							<a href="../publicaciones">Publicaciones</a>
						</li>
						<li <?php if($activo == 'inscriptos'){ echo 'class="active"'; } ?>>
							<a href="../inscriptos">Inscriptos</a>
						</li>
						<li <?php if($activo == 'encuestas'){ echo 'class="active"'; } ?> >
							<a href="../encuestas">Encuestas</a>
						</li>
						<li <?php if($activo == 'informe'){ echo 'class="active"'; } ?> >
							<a href="../informe">Informe</a>
						</li>
						<li <?php if($activo == 'ver_pagina'){ echo 'class="active"'; } ?> >
							<a href="../../index.php" target="_blank">Ver página</a>
						</li>
					</ul>
					<p class="navbar-text pull-right right-menu">
						<a href="../verificar.php?opcion=logout" class="navbar-link">Cerrar sesión</a>
					</p>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- Fin menu -->
<?php } ?>
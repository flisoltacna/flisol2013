<?php 
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');
?>
<?php head();?>
	<!-- menu -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Flisol 2013</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="#">Home</a></li>
						<li><a href="../publicaciones">Publicaciones</a></li>
						<li><a href="../inscriptos">Inscriptos</a></li>
						<li class="active"><a href="../encuestas">Encuestas</a></li>
						<li><a href="../../index.php" target="_blank">Ver página</a></li>
					</ul>
					<p class="navbar-text pull-right right-menu">
						<a href="../verificar.php?opcion=logout" class="navbar-link">Cerrar sesión</a>
					</p>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- Fin menu -->

	<div class="container">		
		<ul class="breadcrumb">
			<li><a href="#"><i class="icon-home"></i></a><span class="divider">/</span>
			</li>
	    	<li><a href="#">Home</a> <span class="divider">/</span></li>
	    	<li class="active">Encuestas</li>
    	</ul>

    	<div class="row">
    		<div class="span1">
				<a href="agregar.php" class="btn btn-primary">
					<i class="icon-plus icon-white"></i><br>Agregar
				</a>
			</div>
    	</div>
    	<?php 
    		$encuestas = @query_data("SELECT * FROM encuestas");
    	?>
    	<div class="row-fluid">
    		<div class="span12">
    			<div class="box">
    				<h4 class="box-header round-top">Gestión de Encuestas</h4>
    				<div class="box-content">
    					<table id="dataTable" class="table table-striped table-bordered">
    						<thead>
    							<th>#</th>
    							<th>Titulo</th>
    							<th>Fecha registro</th>
    							<th>Acciones</th>
    						</thead>
    						<tbody>
    							<?php if(!empty($encuestas)):?>
    							<?php foreach ($encuestas as $encuesta): ?>
								<tr> 
									<td><?php echo $encuesta['id']; ?></td>
							        <td><?php echo utf8_encode($encuesta['encuesta_titulo']); ?></td>
									<td>
										<?php setlocale(LC_TIME, "spanish");
											$fecha = strftime(" %d/%m/%y %H:%M:%S ",strtotime($encuesta['fecha_creacion']));
											echo $fecha;
										?>
									</td>
									<td>
										<a class="btn btn-success" title="Asignar encuesta" href="asignar.php?id=<?php echo $encuesta['id']?>">
											<i class="icon-user icon-white"></i>
										</a>
										<a class="btn btn-warning" title="Editar encuesta" href="editar.php?id=<?php echo $encuesta['id']?>">
											<i class="icon-pencil icon-white"></i>
										</a>
										<a class="btn btn-info" title="Ver encuesta" href="encuesta.php?id=<?php echo $encuesta['id']?>">
											<i class="icon-search icon-white"></i>
										</a>
										<a class="btn btn-danger" onclick="return confirm('¿Está seguro?');" title="Eliminar" href="#">
											<i class="icon-trash icon-white"></i>
										</a>
							         </td>
								</tr>
							    <?php endforeach; ?>
							<?php endif;?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
	</div> <!-- /container -->
<?php footer();?>
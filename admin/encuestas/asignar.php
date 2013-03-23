<?php
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php'); 
	require_once('controlador.php'); 
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
	    	<li><a href="../encuestas">Encuestas</a> <span class="divider">/</span></li>
	    	<li class="active">Asignar</li>
    	</ul>

    	<div class="row-fluid">
	    	<div class="span12">
	    		<div class="page-header">
					<h1>Encuestas
						<small>Asignar encuesta</small>
					</h1>
				</div>

				<?php 
					if(isset($_GET['msjencuesta'])){
						switch ($_GET['msjencuesta']) {
							case 1: alertas("La encuesta se asignó correctamente.",1); break;
							case 2: alertas("Hubo un error al asignar la encuesta. Intente de nuevo",2); break;
						}		
					}

					if(isset($_GET['msjasignacion'])){
						switch ($_GET['msjasignacion']) {
							case 1: alertas("La operación se llevo correctamente.",1); break;
							case 2: alertas("Hubo un error al eliminar la asignación. Intente de nuevo",2); break;
						}		
					}
				?>
			</div>
		</div>
		<div class="well">
			<?php 
				$id = $_GET['id'];
				$encuestas = @query_data("SELECT * FROM encuestas");
				$grupos = @query_data("SELECT * FROM grupos");
				$asignaciones = @query_data("SELECT asig.id AS id,enc.id AS id_encuesta,encuesta_titulo,grupo_nombre,activo FROM asignaciones AS asig 
					INNER JOIN encuestas AS enc ON enc.id = asig.encuesta_id
					INNER JOIN grupos AS grup ON grup.id = asig.grupo_id WHERE enc.id = $id");
			?>

			<table class="table table-striped dataTable">
				<thead>
					<th>#</th>
					<th>Encuesta</th>
					<th>Grupo</th>
					<th>Activo</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					<?php if(!empty($asignaciones)):?>
					<?php foreach ($asignaciones as $asignar) {?>
						<tr>
							<td><?php echo $asignar['id'];?></td>
							<td><?php echo utf8_encode($asignar['encuesta_titulo']);?></td>
							<td><?php echo utf8_encode($asignar['grupo_nombre']);?></td>
							<td>
								<?php if($asignar['activo']):?>
									<img src="../../recursos/img/tick_circle.png">
								<?php else: ?>
									<img src="../../recursos/img/icon-16-delete.png">
								<?php endif;?>
							</td>
							<td>
								<a onclick="return confirm('¿Está seguro?');" title="Eliminar" href="asignar.php?opcion=delete_asig&id=<?php echo $asignar['id'];?>">
									<i class="icon-remove"></i>
								</a>

							</td>
						</tr>	
					<?php };?>
					<?php endif;?>
				</tbody>
			</table>

			<form action="asignar.php" method="post" id="AsignarAdd" accept-charset="utf-8">
				<div class="control-group">
    				<label>Encuesta</label>
    				<div class="controls">
    					<select name="encuesta" class="span5">
    						<?php foreach ($encuestas as $encuesta) {
    							$id_encuesta = $encuesta['id'];
    							if($encuesta['id'] == $id){
    								echo '<option value='."$id_encuesta".' selected="selected">'.utf8_encode($encuesta['encuesta_titulo']).'</option>';
    							}
    							else{
    								echo '<option value='."$id_encuesta".'>'.utf8_encode($encuesta['encuesta_titulo']).'</option>';
    							}
    								
    						}?>
						</select>
    				</div>
    			</div>
    			<div class="control-group">
    				<label>Seleccione la población</label>
    				<div class="controls">
    					<select name="grupo" class="span5">
    						<?php foreach ($grupos as $grupo) {
    							$id_grupo = $grupo['id'];
								echo '<option value='."$id_grupo".'>'.utf8_encode($grupo['grupo_nombre']).'</option>';
    						};?>
						</select>
    				</div>
    			</div>
    			<div class="control-group">
	    			<label class="radio inline">
						<input type="radio" name="activo" value="1" checked>
						Activar
					</label>
					<label class="radio inline">
						<input type="radio" name="activo" value="0">
						Desactivar
					</label>
				</div>
				<div class="form-actions">
	    			<button type="submit" name="asignar_encuesta" class="btn btn-success block-menu">
	    					<i class="icon-ok icon-white"></i> Agregar</button>
	    			<a class="btn block-menu" href="index.php"><i class="icon-remove"></i> Cancelar</a>
    			</div>
    		</form>
		</div>
	</div><!-- container -->
<?php footer();?>
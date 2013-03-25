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
						<li class="active"><a href="../inscriptos">Inscriptos</a></li>
						<li><a href="../encuestas">Encuestas</a></li>
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
	    	<li><a href="../inscriptos">Inscriptos</a> <span class="divider">/</span></li>
	    	<li class="active">Editar inscripción</li>
    	</ul>

    	<div class="row-fluid">
    		<div class="span12">
    			<div class="page-header">
					<h1>Inscripciones
						<small>Agregar</small>
					</h1>
				</div>

				<?php 
					$id = $_GET['id'];
					$inscripto = query("SELECT * FROM inscriptos WHERE id = $id");
				?>
    			<div class="well">
    					<form action="agregar.php" id="publicaciones" method="post" accept-charset="utf-8">
    						<input type="hidden" name="id_inscripto" value="<?php echo $id;?>">
    						<div class="row-fluid">
    							<div class="span5">
	    							<label for="InscripcionNombres">Nombres</label>
	    							<input name="nombres" class="span12" maxlength="120" type="text" id="InscripcionNombres" required="required" value="<?php echo $inscripto['nombres'];?>"/>
    							</div>
    							<div class="span6">
    								<label for="InscripcionApellidos">Apellidos</label>
    								<input name="apellidos" class="span12" maxlength="120" type="text" id="InscripcionApellidos" value="<?php echo $inscripto['apellidos'];?>" required="required" />
    							</div>
    						</div>
    						<div class="row-fluid">
    							<div class="span3">
    								<label for="InscripcionDni">D.N.I.</label>
    								<input name="dni" class="span12" maxlength="8" type="text" id="InscripcionDni" value="<?php echo $inscripto['dni'];?>" />
    							</div>
    							<div class="span5">
    								<label for="InscripcionEmail">Email</label>
									<input name="email" class="span12" maxlength="200" type="text" id="InscripcionEmail" value="<?php echo $inscripto['email'];?>" required="required" />
								</div>
								<div class="span3">
									<label for="InscripcionTelefono">Teléfono</label>    							
    								<input name="telefono" class="span12" maxlength="15" type="text" id="InscripcionTelefono" value="<?php echo $inscripto['telefono'];?>" />  
								</div>
    						</div>
    						<div class="control-group">
    							<label for="InscripcionInstitucion">Institución</label>
    							<div class="controls">
    								<input name="institucion" class="span8" maxlength="225" type="text" id="InscripcionInstitucion" value="<?php echo $inscripto['organizacion'];?>" />
    							</div>
    						</div>
    						<div class="control-group">
				    			<label class="checkbox inline">
									<input type="checkbox" name="certificado" value="1" <?php if($inscripto['certificado']):?> checked <?php endif;?> >Certificado
								</label>
								<label class="checkbox inline">
									<input type="checkbox" name="asistencia" value="1" <?php if($inscripto['asistencia']):?> checked <?php endif;?> >Asistencia
								</label>
							</div>
    						<div class="form-actions">
    							<button type="submit" name="actualizar_inscripcion" class="btn btn-success block-menu">
    								<i class="icon-ok icon-white"></i> Guardar</button>
    							<a class="btn block-menu" href="index.php">
									<i class="icon-remove"></i> Cancelar
								</a>
    						</div>
    					</form>
    			</div>	
    	</div>
	</div> <!-- /container -->

<?php footer();?>
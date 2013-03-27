<?php 
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');
	require_once('controlador.php'); 
?>
<?php 
	head();
	menu("encuestas");
?>
	<div class="container">		
		<ul class="breadcrumb">
			<li><a href="#"><i class="icon-home"></i></a><span class="divider">/</span>
			</li>
	    	<li><a href="#">Home</a> <span class="divider">/</span></li>
	    	<li><a href="../encuestas">Encuestas</a> <span class="divider">/</span></li>
	    	<li class="active">Nueva encuesta</li>
    	</ul>

    	<div class="row-fluid">
    		<div class="span12">
    			<div class="page-header">
					<h1>Encuestas
						<small>Agregar encuesta</small>
					</h1>
				</div>
    			<div class="well">
    					<form action="agregar.php" id="encuestas" method="post" accept-charset="utf-8">
    						<input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario_id'];?>">
    						<div class="control-group">
    							<label for="EncuestaTitulo">Titulo</label>
    							<div class="controls">
    								<input name="titulo" class="span8" maxlength="120" type="text" id="EncuestaTitulo" required="required" />
    							</div>
    						</div>
    						<div class="control-group">
    							<label for="EncuestaDescripcion">Descripción</label>
    							<div class="controls">
    								<textarea name="descripcion" class="span9" rows="3" id="EncuestaDescripcion"></textarea>
    							</div>
    						</div>
    						<div class="form-actions">
    							<button type="submit" name="guardar_encuesta" class="btn btn-success block-menu">
    								<i class="icon-ok icon-white"></i> Siguiente</button>
    							<a class="btn block-menu" href="index.php">
									<i class="icon-remove"></i> Cancelar
								</a>
    						</div>
    					</form>
    			</div>	
    	</div>
	</div> <!-- /container -->

<?php footer();?>
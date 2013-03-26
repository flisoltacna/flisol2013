<?php 
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');
	require_once('controlador.php'); 
?>
<?php 
	head();
	menu("publicaciones");
?>
	
	<div class="container">		
		<ul class="breadcrumb">
			<li><a href="#"><i class="icon-home"></i></a><span class="divider">/</span>
			</li>
	    	<li><a href="#">Home</a> <span class="divider">/</span></li>
	    	<li><a href="../publicaciones">Publicaciones</a> <span class="divider">/</span></li>
	    	<li class="active">Nueva publicación</li>
    	</ul>

    	<div class="row-fluid">
    		<div class="span12">
    			<div class="page-header">
					<h1>Publicaciones
						<small>Agregar</small>
					</h1>
				</div>
    			<div class="well">
    					<form action="agregar.php" id="publicaciones" method="post" accept-charset="utf-8">
    						<input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario_id'];?>">
    						<div class="control-group">
    							<label for="Titulo">Titulo</label>
    							<div class="controls">
    								<input name="titulo" class="span8" maxlength="120" type="text" id="Titulo" required="required" />
    							</div>
    						</div>
    						<div class="control-group">
    							<label for="Descripcion">Descripción</label>
    							<div class="controls">
    								<textarea name="descripcion" class="span9" rows="5" id="Descripcion"></textarea>
    							</div>
    						</div>
    						<div class="form-actions">
    							<button type="submit" name="guardar_publicacion" class="btn btn-success block-menu">
    								<i class="icon-ok icon-white"></i> Guardar</button>
    							<a class="btn block-menu" href="index.php">
									<i class="icon-remove"></i> Cancelar
								</a>
    						</div>
    					</form>
    			</div>	
    	</div>
	</div> <!-- /container -->

<script type="text/javascript">
	CKEDITOR.replace('Descripcion',{
		toolbar: 'standard',
    	width: '100%',
    	height: '200'
	});
</script>

<?php footer();?>
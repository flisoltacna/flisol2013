<?php 
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');
	require_once('controlador.php');
?>
<?php 
	head();
	menu("inscriptos");
?>
<div class="container">		
	<ul class="breadcrumb">
		<li><a href="#"><i class="icon-home"></i></a><span class="divider">/</span></li>
		<li><a href="../inscriptos/">Inscriptos</a><span class="divider">/</span></li>
	    <li class="active">Enviar mensaje</li>
    </ul>
    <div class="page-header">
		<h1>Mensajes <small>Enviar mensaje</small></h1>
	</div>
	<?php 
		if(isset($_POST['ids'])){
			$ids=$_POST['ids'];
			$inscriptos = query_data("SELECT * FROM inscriptos WHERE id IN($ids)");
		}else{
			header('Location: ../inscriptos/');
		}
	?>
	<form action="index.php" method="POST" accept-charset="utf-8" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="txt_asunto">Asunto</label>
			<div class="controls">
				<input type="text" name="asunto" id="txt_asunto" placeholder="Asunto" class="input-block-level">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txt_destinatarios">Para</label>
			<div class="controls">
				<textarea name="destinatarios" id="txt_destinatarios" class="input-block-level" disabled ><?php foreach($inscriptos as $inscripto){
						echo $inscripto['email']. '; ';
					} ?>
				</textarea>
				<input type="hidden" name="emails_inscriptos" value="<?php $j=1; foreach($inscriptos as $inscripto){
						if(count($inscriptos) != $j ){
							echo $inscripto['email']. '; ';	
						}else{
							echo $inscripto['email'];
						}
						$j++;	
					} ?>"  />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txt_mensaje">Mensaje</label>
			<div class="controls">
				<textarea name="mensaje_contenido" class="input-block-level" rows="5" id="txt_mensaje"></textarea>
			</div>
		</div>
		<div class="form-actions">
	    	<button type="submit" name="btn_enviar_mensaje" class="btn btn-primary"><i class="icon-envelope icon-white"></i> Enviar mensaje</button>
	    	<a href="../inscriptos/" class="btn"><i class="icon-ban-circle"></i> Cancelar</a>
	    </div>
	</form>
</div><!-- /container -->
<br />
<script type="text/javascript">
	CKEDITOR.replace('txt_mensaje',{
		toolbar: 'Basic2',
    	width: '100%',
    	height: '200'
	});
</script>
<style type="text/css">
	.form-actions{
		padding: 19px 20px 20px;
	}
</style>
<?php footer();?>
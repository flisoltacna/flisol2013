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
	    	<li class="active">Ver</li>
    	</ul>

    	<div class="row-fluid">
	    	<div class="span12">
	    		<div class="page-header">
					<h1>Encuestas
						<small>Ver encuesta</small>
					</h1>
				</div>
			</div>
		</div>
		<?php 
			$id = $_GET['id'];
			$preguntas = @query_data("SELECT * FROM preguntas WHERE encuesta_id = $id");
		?>
		<div class="well">
			<?php if(!empty($preguntas)){ ?>
			<ul class="listado">
				<?php $i=1;?>
				<?php foreach ($preguntas as $pregunta) {?>
					<li>
						<h6><?php echo $i.'. '. utf8_encode($pregunta['formulacion_pregunta']);?></h6>
						<div class="opciones">
							<?php
								$id_pregunta = $pregunta['id'];
								$opciones = @query_data("SELECT * FROM opciones WHERE pregunta_id = $id_pregunta");
								
								if(!empty($opciones)){
									foreach ($opciones as $opcion) {
										echo '<div class="radio"><input type ="radio" name="opciones"/>'.$opcion['opcion_respuesta'].'</div>';
									}
								}				
							?>
						</div>
					</li>
				<?php $i++; };?>
			</ul>
			<?php };?>
		</div>
	</div><!-- container -->


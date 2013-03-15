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


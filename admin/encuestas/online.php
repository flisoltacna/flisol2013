<?php 
	require_once('../../config/conexion.php');
	require_once('controlador.php'); 
?>
<!DOCTYPE HTML>
<html lang="es-Es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Festival latinoamericano de instalacion de Software libre 2013 - Flisol tacna">
	<meta name="author" content="comunidad de software libre Basadrinux" >
	<title>Festival latinoamericano de instalacion de Software libre 2013 - Flisol Tacna</title>
	<link href="<?php echo URL_APP;?>recursos/img/icono.png" rel="shortcut icon" type='image/gif'/>
	<link rel="stylesheet" href="<?php echo URL_APP;?>recursos/css/encuesta.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="<?php echo URL_APP;?>recursos/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo URL_APP;?>recursos/js/jquery.validation.functions.js"></script>	
</head>
<body>
<?php 
	$preguntas = @query_data("SELECT * FROM preguntas WHERE encuesta_id=1");
?>
	<form action="online.php" method="post" id="EncuestaOnline">
		<div id="quickyform" class="" style="display: block;">
			<div class="wrapper">
				<?php if(!empty($preguntas)){ ?>
					<ul id="questions" style="margin-top: 100px; margin-bottom: 20px;">
						<?php $i=0;?>
						<?php foreach ($preguntas as $pregunta) {?>

							<li id="validar<?php echo $pregunta['id'] ?>" class="list open">
								<script type="text/javascript">
						            jQuery(function(){
						                jQuery('#validar<?php echo $pregunta['id'] ?>').validate({
						                    expression: "if (isChecked(SelfID)) return true; else return false;",
						                });
						            });
								</script>
								<div class="item">
									<?php echo $i+1; ?>
									<div class="arrow">
										<div class="arrow-right"></div>
									</div>
								</div>
								<div class="question">
									<?php echo utf8_encode($pregunta['formulacion_pregunta']);?>
								</div>
								<div class="content">
									<div class="content-wrapper">
										<?php
											$id_pregunta = $pregunta['id'];
											$opciones = @query_data("SELECT * FROM opciones WHERE pregunta_id = $id_pregunta");
										?>
										<ul class="list-opciones">
										<?php if(!empty($opciones)){?>
											<?php foreach ($opciones as $opcion) {?>
												<li class="opciones">
													<label>
														<input type ="radio" name="opcion[<?php echo $i;?>]" value="<?php echo $opcion['id']?>" /><?php echo $opcion['opcion_respuesta'];?>
													</label>
												</li>
											<?php };?>
										<?php };?>
										</ul>
									</div>
								</div>
							</li>
						<?php $i++; };?>
					</ul>
				<?php };?>	
			</div>
		</div>
		<div class="contenido">
			<button type="submit" name="votar" class="btn btn-success">Enviar</button>
		</div>
	</form>
</body>
</html>

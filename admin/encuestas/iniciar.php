<?php 
	require_once('../../config/conexion.php');
?>
<!DOCTYPE HTML>
<html lang="es-Es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Festival latinoamericano de instalacion de Software libre 2013 - Flisol tacna">
	<meta name="author" content="comunidad de software libre Basadrinux" >
	<link href="<?php echo URL_APP;?>recursos/img/icono.png" rel="shortcut icon" type='image/gif'/>
	<link rel="stylesheet" href="<?php echo URL_APP;?>recursos/css/encuesta.css">
	<title>Festival latinoamericano de instalacion de Software libre 2013 - Flisol Tacna</title>
</head>
<body>
	<div id="fb-root"></div>
	<div class="portada">
		<img src="<?php echo URL_APP;?>recursos/img/portada.png">
	</div>
	<div class="contenido">
		<h2>Bienvenido a la siguiente encuesta sobre Software Libre!</h2>
		<p><div class="fb-like" data-href="<?php echo URL_APP;?>admin/encuestas/iniciar.php" data-send="false" data-width="370" data-show-faces="true" data-font="arial"></div></p>
		<p>
			<a href="online.php" class="btn btn-success">Empezar</a>	
		</p>
	</div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>


<?php 
	require_once('../../config/conexion.php');
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
</head>
<body>
	<div id="fb-root"></div>
	<div id="fin-encuesta">
		<p>La encuesta se ha enviado satisfactoriamente.</p> 
		<span class="cita"><h2>¡Gracias por tu Participación!</h2></span>
		<p>Compartelo con tus amigos
			<div class="social">
				<!-- compartir con redes sociales -->
				<?php $url= URL_APP."admin/encuestas/iniciar.php";?>
				<!-- twitter -->
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url;?>" data-text="encuesta sobre Software Libre" data-via="FlisolTacna" data-lang="es">Twittear</a>
		                            
		        <!-- Facebook -->
		        <div class="fb-like" data-href="<?php echo $url;?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-font="arial">
				</div>

				<!-- Google + -->
				<div class="g-plusone" data-size="medium" data-href="<?php echo $url;?>"></div>
			</div>
		</p>
	</div>
	<div align="center"><img src="<?php echo URL_APP;?>recursos/img/portada.png"></div>	


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>

<!-- Facebook -->
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Inserta esta etiqueta después de la última etiqueta de Botón +1. -->
<script type="text/javascript">
	window.___gcfg = {lang: 'es'};

	(function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
</script>

<style type="text/css">
#___plusone_0{
	width: 75px !important;
}
.twitter-share-button{
	width: 95px !important;
}
.fb-like.fb_iframe_widget{
	width: 104px !important;	
}
.fb-like span{
	height: 22px !important
}
</style>
</body>
</html>
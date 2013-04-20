<?php 
	require_once('config/conexion.php');
	require_once('recursos/funciones.php');

	if (isset($_POST["mysubmit"])) {
		$error = include_once("admin/inscriptos/registrar.php");

		if ($error === false) {
			exit;
		}
	}

	if (isset($_POST["ticket"])) {
		$errorticket = include_once("admin/inscriptos/buscar.php");

		if ($errorticket === false) {
			exit;
		}
	}
?>
<!DOCTYPE HTML>
<html lang="es-Es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Festival latinoamericano de instalacion de Software libre 2013 - Flisol tacna">
	<meta name="author" content="comunidad de software libre Basadrinux">
	<link href='recursos/img/icono.png' rel='shortcut icon' type='image/gif'/>
	<link rel="stylesheet" href="recursos/css/web.css">
	<link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>	
	<!--Cuenta regresiva-->
	<link type="text/css" href="recursos/js/jquery.countdown.css" rel="stylesheet" />
	<script type="text/javascript" src="recursos/js/ext/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="recursos/js/jquery.countdown.js"></script>
	<script type="text/javascript" src="recursos/js/jquery.countdown-es.js"></script>

	<script type="text/javascript">
	$(function () {
	    var austDay = new Date();
	    date_end2 = new Date(2013, 4 - 1, 27);
	    $('#defaultCountdown2').countdown({until: date_end2});
	});
	</script>
	<!-- Fin Cuenta regresiva-->
	<!--ver El form-->
	<script type="text/javascript">
		var box_actions = {
	    open: function(){
	        $('#formulario').slideDown('slow');
	        $('#Preinscripcion').css('display','none');

	        $('#info-derecha').css('display','none');
	        $('#fondobanner').css('height','200px');
	        $('#info-izquierda').css('font-size','10px' ).css('width','100%').css('height','auto').css('background','#363636');
	        $('#redsocial').css('display','none');
	        $('#total').css('display','none');
	        $('#CerrarPreinscripcion').css('display','block');

	        $('#CerrarBusqueda').css('display','none');
			$('#form-ticket').css('display','none');
	    },
	    close: function(){
	        $('#formulario').slideUp('slow');
	        $('#Preinscripcion').css('display','block');

	        $('#info-derecha').css('display','block');
	        $('#fondobanner').css('height','630px');
	        $('#info-izquierda').css('font-size','100%' ).css('width','300px').css('height','400px').css('background','none');
	        $('#redsocial').css('display','block');
	        $('#total').css('display','block');
	        $('#CerrarPreinscripcion').css('display','none');
	    }
	}

	var ticket = {
		open: function(){
			$('#form-ticket').slideDown('slow');
			$('#CerrarBusqueda').css('display','block');			
		},
		close: function(){
			$('#form-ticket').slideDown('slow');
			$('#CerrarBusqueda').css('display','none');
			$('#form-ticket').css('display','none');
		}
	}
	</script>
	<!--FIN ver El form-->
	<title>Flisol Tacna</title>
</head>
<body>
	<div id="fb-root"></div>
	<div id="encabezado">
		<div id="sol"></div>

		<header>
			<div id="logo">
				<img src="recursos/img/logo.png" />
			</div>
				<div id="menutop">
					<div id="reloj">
						<center>	
							<div id="falta">Faltan:</div>
							<section>
							<!--Cuenta Regresiva-->		
							<div id="defaultCountdown2">
							</div>
							</section>
				 			<!--fin cuenta regresiva--> 
				 			<a href="#fondobanner"><img src="recursos/img/ico-inicio.png" /></a>
				 		</center>
					</div>
				</div>
			
		<script type="text/javascript" src="recursos/js/scrolltop.js"></script>
		</header>		
	</div>
	<div id="fondobanner"<?php if (isset($error)) echo ' style="height: 200px"'; ?>>
	<div id="banner">
	<div id="titulo">
		<hgroup><h1>9no Festival Latinoamericano de Instalación de Software Libre- Flisol Peru 2013</h1></hgroup>
	</div>

	<div id="info">
<!--Neuvo Menu-->	
			<div id="menu1">
			<nav>
				<ul>
					<li><a href="#evento">Sobre Flisol</a></li>
					<li><a href="#lugar">Lugar del Evento</a></li>
					<li><a href="#cronograma">Cronograma</a></li>
					<li><a href="#organizadores">Organizadores</a></li>
				</ul>
			</nav></div>

	<div id="info-izquierda"<?php if (isset($error)) echo ' style="font-size: 10px; width: 100%; height: auto; background: #363636"'; ?>>	
		<hgroup><h1>Sábado 27 de Abril</h1></hgroup>
		<hgroup><div class="lema"><h3>
			"Ahora en Tacna se vive el software libre"
		</h3></div></hgroup>
		<?php 
			$total = query("SELECT MAX(id) AS total FROM inscriptos");
			$disponible = 300 - (int)$total['total'];
		?>
		<div id="total">
			<h4><?php echo $disponible;?><span>Entradas disponibles</span></h4>
		</div>
		<div id="Preinscripcion"<?php if (isset($error)) echo ' style="display: none"'; ?>>
			<a href="javascript:box_actions.open()">Realizar Inscripcion</a>
		</div>
		<div id="CerrarPreinscripcion" style="<?php if (isset($error)) echo 'display: block'; else echo 'display: none'; ?>">
			<a href="javascript:box_actions.close()">Cancelar Inscripcion</a>
		</div>
		<div id="redsocial"<?php if (isset($error)) echo ' style="display: none"'; ?>>
			<span>Síguenos en</span>
			<a href="https://www.facebook.com/FlisolTacnaPeru" target="_blank"><img src="recursos/img/facebook-icon.png"></a>
			<a href="https://twitter.com/flisoltacna" target="_blank"><img src="recursos/img/twitter-icon.png"></a>
			<a href="https://www.youtube.com/user/FlisolTacnaPeru" target="_blank"><img src="recursos/img/youtube-icon.png"></a>
			<a href="https://plus.google.com/u/0/111966957349242981203" target="_blank"><img src="recursos/img/google-icon.png"></a>
		</div>
	</div>	
	<!--<div id="info-centro">
	</div>-->
	<div id="info-derecha"<?php if (isset($error)) echo ' style="display: none"'; ?>>
		<object width="650" height="400"><param name="movie" value="http://www.youtube-nocookie.com/v/ut5s3ESEL5Q?version=3&amp;hl=es_MX"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/ut5s3ESEL5Q?version=3&amp;hl=es_MX" type="application/x-shockwave-flash" width="650" height="400" allowscriptaccess="always" allowfullscreen="true"></embed></object>
	</div>
	</div>
	</div>

	<div id="ticket">
		<p>
			<span style="color: #ffb532;">(*) </span>
			<span>¿Perdiste tu Ticket?</span>, entonces haz click en el siguiente 
			<a href="javascript:ticket.open()">enlace.</a> 
		</p>
	</div>	
	</div>

	<div id="contenedor">
		<div id="content-buscar">
			<div id="CerrarBusqueda" style="display: none">
				<a href="javascript:ticket.close()">Cancelar búsqueda</a>
			</div>
			<div id="form-ticket">
				<form action="<?php echo URL_APP; ?>" method="POST">
					<fieldset>
						<label>DNI.</label>
						<input type="text" name="dni" size="27" pattern="\d{8}" maxlength="8" autofocus required/>
						<input type="submit" name="ticket" id="mysubmit" value="Generar Ticket"/>
					</fieldset>
				</form>
			</div>
		</div>

	<!--FORMULARIO-->
		<div id="formulario"<?php if (isset($error)) echo ' style="display: block"'; ?>> 
		<form action="<?php echo URL_APP; ?>" method="POST" id="fo3" name="fo3" onSubmit="return limpiar()" >
		<fieldset>
			<div class="clearfix">
				<label>Nombres</label>
				<input type="text" name="nombre" size="27" autofocus required value="<?php if (isset($_POST["nombre"])) echo $_POST["nombre"]; ?>" />
			</div>
			<div class="clearfix">
				<label>Apellidos</label>
				<input type="text" name="apellidos" size="27" autofocus required value="<?php if (isset($_POST["apellidos"])) echo $_POST["apellidos"]; ?>" />
			</div>
			<div class="clearfix">
				<label>DNI</label>
				<input type="text" name="dni" size="27" pattern="\d{8}" maxlength="8" required value="<?php if (isset($_POST["dni"])) echo $_POST["dni"]; ?>" />
			</div>
			<div class="clearfix">
				<label>Email</label>
				<input type="email" name="email" size="27" required value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>" />
			</div>
			<div class="clearfix">
				<label>Teléfono</label>
				<input type="text" name="fono" size="27" pattern="\+?\d{9,13}" required value="<?php if (isset($_POST["fono"])) echo $_POST["fono"]; ?>" />
			</div>
			<div class="clearfix">
				<label>Organización/C. Estudio/Empresa</label>
				<input type="text" name="organizacion" size="27" required value="<?php if (isset($_POST["organizacion"])) echo $_POST["organizacion"]; ?>" />
			</div>
			<div id="certificado">
			<label>Certificado: (S/. 20)</label>
			<label><input type="radio" name="certificado" value="SI" <?php if (isset($_POST["certificado"]) and $_POST["certificado"] == "SI") echo "checked "; ?>/> Sí</label>
			<label><input type="radio" name="certificado" value="NO" <?php if (isset($_POST["certificado"]) and $_POST["certificado"] == "SI") echo " "; else echo "checked "; ?>/> No</label>
			</div>
			<input type="submit" name="mysubmit" id="mysubmit" value="Realizar Inscripción"/>
		</fieldset>	
		<!-- RESULTADO--> 
			<div id="result"></div>
		</form>
		</div>
	<!-- FIN FORMULARIO-->
		<div class="cinta"></div>
		<div id="evento">
			<?php 
				$publicacion = @query('SELECT * FROM publicaciones WHERE titulo = "SOBRE FLISOL"');
			?>
			<section>
				<hgroup>
					<h3><?php echo $publicacion['titulo'];?></h3>
				</hgroup>
				<?php echo $publicacion['descripcion'];?>
			</section>

			<div id="masdatos">
				<div id="encuesta">
					<h3>Encuesta</h3>
					<span>
						<a href="admin/encuestas/iniciar.php" target="_blank">Llenar Encuesta</a>
					</span>
				</div>
				<div id="masdatos02">
					<h3>Flisol 2012</h3>
					<!-- Galeria de Imagenes -->
					<div id="picasa"></div>
					<!-- Galeria de Imagenes -->
				</div>
				<div id="facebook">
					<div class="fb-like-box" data-href="https://www.facebook.com/FlisolTacnaPeru" data-width="450" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-border-color="#BD2B2B" data-header="false"></div>
				</div>
			</div>
		</div>
		
		<div class="cinta2"></div>
<div id="datosevento">
			<div id="lugar">
				<h3>Lugar</h3>
				<p>El Evento se Desarrolllará en el CENTRO CULTURAL MUNICIPAL ALTO DE LA ALIANZA el Sábado 27 de Abril desde las 9 am hasta las 8 pm
				</p>
		<iframe width="535" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.pe/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=centro+cultural+tacna+vigil&amp;aq=&amp;sll=-17.993986,-70.244476&amp;sspn=0.001472,0.002642&amp;t=m&amp;ie=UTF8&amp;hq=centro+cultural&amp;hnear=Vigil,+Tacna&amp;ll=-17.993826,-70.244533&amp;spn=0.003571,0.00456&amp;z=17&amp;output=embed"></iframe>
			<img src="recursos/img/fotoflisol.png"/>
			</div>
			<div id="cronograma">
				 <h3>Cronograma</h3>
				 <img src="recursos/img/lineas-tematicas.png"/>
			</div>
</div>
		<div id="organizadores">
			<h3>Organizadores</h3>
				<img src="recursos/img/organizadores/_Logo_BasadrinuX.png"/>
		</div>
		<div class="cinta3"></div>
		<div class="publicidad">
				<div id="patrocinan">
					<h3>Patrocinan</h3>
					<a href="http://www.unjbg.edu.pe"><img src="recursos/img/Patrocinan/logo-UNJBG.png"/></a>
					<a href="http://www.munialtoalianza.gob.pe"><img src="recursos/img/Patrocinan/logo-mdaa.png"/></a>
				</div>
				<div id="auspicios">
					<h3>Auspician</h3>
					<a href="http://innovaeureka.com/"><img src="recursos/img/Patrocinan/eureka.png" width="180px"/></a>
					<a href="#"><img src="recursos/img/Patrocinan/chicha-company.png" width="215px"/></a>
					<a href="#"><img src="recursos/img/Patrocinan/tacna.gif" width="120px"/></a>
					<a href="#"><img src="recursos/img/Patrocinan/radio-cmf.png" width="170px"/></a>
					<a href="#"><img src="recursos/img/Patrocinan/logo-ebenezer.png"/></a>
					<a href="#"><img src="recursos/img/Patrocinan/coyotex.png" /></a>
					<a href="#"><img src="recursos/img/Patrocinan/SUPER_STEREO.png" width="170px"/></a>
				</div> 
		</div>
		<footer>
			<img src="recursos/img/pie1.png">
			<img src="recursos/img/pie2.png">
			<p>
				El contenido de la web está bajo la licencia GPL. 
				El código fuente de esta página está disponible en <a href="https://github.com/flisoltacna" target="_blank">GitHub</a> bajo la GNU Public License 3.0.
			</p>
		</footer>	
	</div>

<?php if(isset($error) and $error == 6):?>
	<script type="text/javascript">
		alert("Ud. ya se encuentra registrado!");	
	</script>
<?php endif;?>

<?php if(isset($errorticket) and $errorticket == 8):?>
	<script type="text/javascript">
		alert("Ud. no se encuentra registrado!");	
	</script>
<?php endif;?>

<script type="text/javascript">
	$.getJSON("http://picasaweb.google.com/data/feed/base/user/111966957349242981203/albumid/5855518971056638033?alt=json&kind=photo&hl=en_US&max-results=8&fields=entry(title,gphoto:numphotos,media:group(media:content,media:thumbnail),link)", 
			function(data) {
			$.each(data.feed.entry, function(i,item){
		            $("<img/>").attr("src", item.media$group.media$thumbnail[2].url).appendTo("#picasa");
		      });	
		});
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
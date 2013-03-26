<?php 
	require_once('config/conexion.php');
?>
<!DOCTYPE HTML>
<html lang="es-PE">
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
	
	<!--========================Formulario Resultado DESACTIVADO
	<script language="javascript">
	$(document).ready(function() {
	    $().ajaxStart(function() {
	        $('#loading').show();
	        $('#result').hide();
	    }).ajaxStop(function() {
	        $('#loading').hide();
	        $('#result').fadeIn('slow');
	    });
	    $('#form, #fat, #fo3').submit(function() {
	        $.ajax({
	            type: 'POST',
	            url: $(this).attr('action'),
	            data: $(this).serialize(),
	            success: function(data) {
	                $('#result').html(data);
	            }
	        })
	        return false;
	    }); 
	})  

	function limpiar() {
	setTimeout('document.fo3.reset()',2000);
	return false;
	}
	</script>
	==============================Formulario Resultado fin-->

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

	        $('#CerrarPreinscripcion').css('display','block');
	    },
	    close: function(){
	        $('#formulario').slideUp('slow');
	        $('#Preinscripcion').css('display','block');

	        $('#info-derecha').css('display','block');
	        $('#fondobanner').css('height','630px');
	        $('#info-izquierda').css('font-size','100%' ).css('width','300px').css('height','400px').css('background','#363636');
	        $('#redsocial').css('display','block');

	        $('#CerrarPreinscripcion').css('display','none');
	    }
	}
	</script>
	<!--FIN ver El form-->
	<title>Flisol Tacna</title>
</head>
<body>
	<div id="encabezado">
		<div id="sol"></div>
		<header>
			<div id="logo">
				<img src="recursos/img/logo.png" />
			</div>
			<nav>
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
				 		</center>
					</div>
				</div>
				<ul>
					<li><a href="#evento">Sobre Flisol</a></li>
					<li><a href="#lugar">Lugar del Evento</a></li>
					<li><a href="#cronograma">Cronograma</a></li>
					<li><a href="#organizadores">Organizadores</a></li>
					<li><a href="#fondobanner">Inicio</a></li>
				</ul>
			</nav>
			
		<script type="text/javascript" src="recursos/js/scrolltop.js"></script>
		</header>		
	</div>
	<div id="fondobanner">
	<div id="banner">
	<div id="titulo">
		<hgroup><h1>9no Festival Latinoamericano de Instalación de Software Libre- Flisol Peru 2013</h1></hgroup>
	</div>	
	<div id="info">
	<div id="info-izquierda">	
		<hgroup><h1>Sábado 27 de Abril</h1></hgroup>
		<hgroup><div class="lema"><h3>
			"Ahora en Tacna se vive el software libre"
		</h3></div></hgroup>
		<hgroup><h3>CENTRO CULTURAL MUNICIPAL ALTO DE LA ALIANZA</h3></hgroup>
		
		<div id="Preinscripcion">
			<a href="javascript:box_actions.open()">Realizar Inscripcion</a>
		</div>
		<div id="CerrarPreinscripcion" style="display:none;">
			<a href="javascript:box_actions.close()">Cancelar Inscripcion</a>
		</div>
		<div id="redsocial">
			<span>Síguenos en</span>
			<a href="https://www.facebook.com/FlisolTacnaPeru" target="_blank"><img src="recursos/img/facebook-icon.png"></a>
			<a href="https://twitter.com/flisoltacna" target="_blank"><img src="recursos/img/twitter-icon.png"></a>
			<a href="https://www.youtube.com/user/FlisolTacnaPeru" target="_blank"><img src="recursos/img/youtube-icon.png"></a>
			<a href="https://plus.google.com/u/0/111966957349242981203" target="_blank"><img src="recursos/img/google-icon.png"></a>
		</div>
	</div>	
	<!--<div id="info-centro">
	</div>-->
	<div id="info-derecha">
		<object width="650" height="400"><param name="movie" value="http://www.youtube-nocookie.com/v/FvLJ2JotttM?hl=es_MX&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/FvLJ2JotttM?hl=es_MX&amp;version=3" type="application/x-shockwave-flash" width="650" height="400" allowscriptaccess="always" allowfullscreen="true"></embed></object>
	</div>
	</div>
	</div>	
	</div>
	<div id="contenedor">
	<!--FORMULARIO-->
		<div id="formulario"> 
		<form action="admin/inscriptos/registrar.php" method="POST" id="fo3" name="fo3" onSubmit="return limpiar()" >
		<fieldset>
			<div class="clearfix">
				<label>Nombres</label>
				<input type="text" name="nombre" size="27" autofocus required />
			</div>
			<div class="clearfix">
				<label>Apellidos</label>
				<input type="text" name="apellidos" size="27" autofocus required />
			</div>
			<div class="clearfix">
				<label>DNI</label>
				<input type="text" name="dni" size="27" pattern="\d{8}" maxlength="8" required />
			</div>
			<div class="clearfix">
				<label>Email</label>
				<input type="email" name="email" size="27" required />
			</div>
			<div class="clearfix">
				<label>Teléfono</label>
				<input type="text" name="fono" size="27" pattern="\+?\d{9,13}" required />
			</div>
			<div class="clearfix">
				<label>Organización/C. Estudio/Empresa</label>
				<input type="text" name="organizacion" size="27" required />
			</div>
			<div id="certificado">
			<label>Certificado: (S/. 20)</label>
			<label><input type="radio" name="certificado" value="1" /> Sí</label>
			<label><input type="radio" name="certificado" value="0" checked/> No</label>
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
				<div id="masdatos01">
					<h3>Encuesta</h3>
					<center>
					<section>
						En Proceso ...
					</section>
				</center>
				</div>
				<div id="masdatos02">
					<h3>Flisol 2012</h3>
					<!-- Galeria de Imagenes -->
					<div id="picasa"></div>
					<!-- Galeria de Imagenes -->
				</div>
			</div>
		</div>
		
		<div class="cinta2"></div>
			<div id="lugar">
				<h3>Lugar</h3>
				<p>El Evento se Desarrolllará en el CENTRO CULTURAL MUNICIPAL ALTO DE LA ALIANZA el Sábado 27 de Abril desde las 9 am hasta las 8 pm
</p>
		<iframe width="425" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.pe/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=centro+cultural+tacna+vigil&amp;aq=&amp;sll=-17.993986,-70.244476&amp;sspn=0.001472,0.002642&amp;t=m&amp;ie=UTF8&amp;hq=centro+cultural&amp;hnear=Vigil,+Tacna&amp;ll=-17.993826,-70.244533&amp;spn=0.003571,0.00456&amp;z=17&amp;output=embed"></iframe>
			</div>
			<div id="cronograma">
				 <h3>Cronograma</h3>
				 <img src="recursos/img/cronograma.png"/>
			</div>
		<div id="organizadores">
			<h3>Organizadores</h3>
				<img src="recursos/img/organizadores/_Logo_BasadrinuX.png"/>
		</div>
		<div class="cinta3"></div>
		<div class="publicidad">
				<div id="patrocinan">
					<h3>Patrocinan</h3>
					<a href=""><img src="recursos/img/Patrocinan/logo-UNJBG.png"/></a>
					
				</div>
				<div id="auspicios">
					<h3>Auspician</h3>
					<a href=""><img src="recursos/img/Patrocinan/eureka.png"/></a>
				</div>
		</div>
		<footer>
			<img src="recursos/img/pie1.png">
			<img src="recursos/img/pie2.png">
			<p>El contenido de la web está bajo la licencia GPL. 
El código fuente de esta página está disponible en <a href="https://github.com/flisoltacna" target="_blank">GitHub</a> bajo la GNU Public License 3.0.</p>
		</footer>	
	</div>
	<script type="text/javascript">
		$.getJSON("http://picasaweb.google.com/data/feed/base/user/111966957349242981203/albumid/5855518971056638033?alt=json&kind=photo&hl=en_US&max-results=8&fields=entry(title,gphoto:numphotos,media:group(media:content,media:thumbnail),link)", 
				function(data) {
				$.each(data.feed.entry, function(i,item){
		            $("<img/>").attr("src", item.media$group.media$thumbnail[2].url).appendTo("#picasa");
		        });	
			});
	</script>
</body>
</html>
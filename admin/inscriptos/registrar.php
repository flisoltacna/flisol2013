<?php
	if (!isset($_POST["mysubmit"])) {
		exit;
	}

	require_once('recursos/funciones.php');

	if (empty($_POST["nombre"]) or empty($_POST["apellidos"]) or empty($_POST["dni"]) or empty($_POST["email"]) or empty($_POST["fono"]) or empty($_POST["organizacion"]) or empty($_POST["certificado"])) {
		return 1;
	}

	if (!validar_campo($_POST["dni"], "\d{8}")) {
		return 2;
	}

	if (!validar_campo($_POST["email"], "^\S+@\S+\.\S+$")) {
		return 3;
	}

	if (!validar_campo($_POST["fono"], "\+?\d{9,13}")) {
		return 4;
	}

	$nombre = strtoupper(utf8_decode($_POST["nombre"]));
	$apellidos = strtoupper(utf8_decode($_POST["apellidos"]));
	$dni = $_POST["dni"];
	$email = $_POST["email"];
	$fono = $_POST["fono"];
	$organizacion = $_POST["organizacion"];
	$certificado = $_POST["certificado"];
	$fecha = fecha_hora();

	if(!consulta("INSERT INTO inscriptos(nombres, apellidos, dni, email, telefono, organizacion, fecha_registro, certificado) VALUES('".$nombre."', '".$apellidos."', ".$dni.", '".$email."', ".$fono.", '".$organizacion."', '".$fecha."', '". ($certificado == "SI" ? "1" : "0") ."')")) {
		return 5;
	}
?>
<!--Codigo Insertado del TICKET-->

<html>
<head>
<title>Ticket de inscripción Flisol Tacna 2013</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo URL_APP; ?>recursos/css/ticket.css">
</head>
<body>
		<H1>Ticket Generado</H1>
		<h2>Para el Ingreso al Evento tendrá que presentar este ticket </h2>
		<div id="ticket">
			<img src="<?php echo URL_APP; ?>recursos/img/ticket/ticket.png">
					<dvi id="datos">
					<div class="datos_1"><?php echo $nombre ." ".$apellidos ?></div>
					<div class="datos_2"><?php echo $dni?></div>
					<div class="datos_3"><?php echo $certificado?></div>
					</div>
		</div>
		<section>
			<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
			<div id="inicio"> <a href="<?php echo URL_APP; ?>">Ir a Inicio</a></div>
		</section>

</body>
</html>
<?php
	return false;
?>
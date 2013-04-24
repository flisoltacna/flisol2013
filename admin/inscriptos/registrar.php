<?php
	require_once('recursos/funciones.php');

	if (!isset($_POST["mysubmit"])) {
		exit;
	}	

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

	$nombre = ucfirst_upp($_POST["nombre"]);
	$apellidos = ucfirst_upp($_POST["apellidos"]);
	$dni = $_POST["dni"];
	$email = $_POST["email"];
	$fono = $_POST["fono"];
	$organizacion = $_POST["organizacion"];
	$certificado = $_POST["certificado"];
	$fecha = fecha_hora();
	
	//buscar si se encuentra registrado,... 
	$inscripto = query("SELECT * FROM inscriptos WHERE dni LIKE '".$dni."' OR (nombres LIKE '".$nombre."' AND apellidos LIKE '".$apellidos."')");
	
	if(empty($inscripto)){
		if(consulta("INSERT INTO inscriptos(nombres, apellidos, dni, email, telefono, organizacion, fecha_registro, certificado) VALUES('".$nombre."', '".$apellidos."', ".$dni.", '".$email."', ".$fono.", '".$organizacion."', '".$fecha."', '". ($certificado == "SI" ? "1" : "0") ."')")) {
			$numero_max = query("SELECT MAX(id) AS numero FROM inscriptos");	
		}
		else{
			return 5;
		}	
	}
	else{
		return 6;
	}

?>


<!--Codigo Insertado del TICKET-->
<!DOCTYPE html>
<html lang="es-PE">
<head>
	<title>Ticket de inscripción Flisol Tacna 2013</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo URL_APP; ?>recursos/css/ticket.css">
</head>
<body>
		<h1>Ticket Generado</h1>
		<h2>Para el Ingreso al Evento tendrá que presentar este ticket </h2>
		<div id="ticket">
			<img src="<?php echo URL_APP; ?>recursos/img/ticket/ticket.png">
			<div id="datos">
				<div class="datos_1"><?php echo $nombre ." ".$apellidos; ?></div>
				<div class="datos_2"><?php echo $dni; ?></div>
				<div class="datos_3"><?php echo $certificado; ?></div>
			</div>
			<?php $numero = "Nro. ".zerofill($numero_max['numero'],4);?>
			<div class="numeracion"><?php echo $numero;?></div>
		</div>
		<section>
			<input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
			<form method="post" action="admin/inscriptos/ticket.php" style="display:inline">
				<input name="nombre" type="hidden" value="<?php echo "$nombre $apellidos"; ?>" />
				<input name="dni" type="hidden" value="<?php echo $dni; ?>" />
				<input name="certificado" type="hidden" value="<?php echo $certificado; ?>" />
				<input name="numero" type="hidden" value="<?php echo $numero; ?>" />
				<input type="submit" name="descargar" value="Descargar" />
			</form>
			<div id="inicio"> <a href="<?php echo URL_APP; ?>">Ir a Inicio</a></div>
		</section>

</body>
</html>
<?php
	return false;
?>
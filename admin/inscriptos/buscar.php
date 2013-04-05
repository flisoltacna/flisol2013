<?php
	require_once('recursos/funciones.php');

	if (!isset($_POST["ticket"])) {
		exit;
	}	

	if (!validar_campo($_POST["dni"], "\d{8}")) {
		return 7;
	}

	$dni = $_POST["dni"];
	
	$inscripto = query("SELECT * FROM inscriptos WHERE dni LIKE '".$dni."'");
	
	if(empty($inscripto)){
		return 8;
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
				<div class="datos_1"><?php echo $inscripto['nombres'] ." ".$inscripto['apellidos']; ?></div>
				<div class="datos_2"><?php echo $dni; ?></div>
				<?php 
					if($inscripto['certificado']){
						$certificado = "SI";
					}
					else{
						$certificado = "NO";
					}
				?>	
				<div class="datos_3"><?php echo $certificado; ?></div>
			</div>
			<?php $numero = "Nro. ".zerofill($inscripto['id'],4);?>
			<div class="numeracion"><?php echo $numero;?></div>
		</div>
		<section>
			<input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
			<form method="post" action="admin/inscriptos/ticket.php" style="display:inline">
				<?php $nombre = $inscripto['nombres']; $apellidos= $inscripto['apellidos'];?>
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
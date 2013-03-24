<?php
	require_once '../../config/conexion.php';
	require_once('../../recursos/funciones.php');

	if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['email']) && !empty($_POST['email'])){
		$nombre=strtoupper(utf8_decode($_POST["nombre"]));
		$apellidos=strtoupper(utf8_decode($_POST["apellidos"]));
		$dni=$_POST["dni"];
		$email=$_POST["email"];
		$fono=$_POST["fono"];
		$organizacion=$_POST["organizacion"];
		$certificado=$_POST["certificado"];
		$fecha = fecha_hora();

		if(consulta("INSERT INTO inscriptos(nombres,apellidos,dni,email,telefono,organizacion,fecha_registro) VALUES('".$nombre."','".$apellidos."',".$dni.",'".$email."',".$fono.", '".$organizacion."','".$fecha."' )")){
			
		}
		
	}
?>
<!--Codigo Insertado del TICKET-->

<html>
<head>
<title>Ticket de inscripción Flisol Tacna 2013</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../recursos/css/ticket.css">
</head>
<body>
		<H1>Ticket Generado</H1>
		<h2>Para el Ingreso al Evento tendrá que presentar este ticket </h2>
		<div id="ticket">
			<img src="../../recursos/img/ticket/ticket.png">
					<dvi id="datos">
					<div class="datos_1"><?php echo $nombre ." ".$apellidos ?></div>
					<div class="datos_2"><?php echo $dni?></div>
					<div class="datos_3"><?php echo $certificado?></div>
					</div>
		</div>
		<section>
			<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
			<div id="inicio"> <a href="http://flisoltacna2013.info">Ir a Inicio</a></div>
		</section>

</body>
</html>
<?php 

function fecha_hora()
{
	$gmt_peru = -5;
	$fecha_gmt = gmmktime(gmdate("H")+$gmt_peru,gmdate("i"),gmdate("s"),gmdate("n"),gmdate("j"),gmdate("Y"));
	$fecha_hora = gmdate('Y-n-j H:i:s',$fecha_gmt);
	return $fecha_hora;
}
function fecha()
{
	$gmt_peru = -5;
	$fecha_gmt = gmmktime(gmdate("H")+$gmt_peru,gmdate("i"),gmdate("s"),gmdate("n"),gmdate("j"),gmdate("Y"));
	$fecha = gmdate('Y-n-j',$fecha_gmt);
	return $fecha;
}

?>
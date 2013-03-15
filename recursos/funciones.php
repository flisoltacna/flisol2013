<?php 

function redondear_dos_decimal($valor) {
	$float_redondeado=round($valor * 100) / 100;
	return $float_redondeado;
}

function retornarStringValido($cadena)
{
    $login = strtolower($cadena);
    $b     = array("á","é","í","ó","ú","ä","ë","ï","ö","ü","à","è","ì","ò","ù","ñ"," ",",",".",";",":","¡","!","¿","?",'"');
    $c     = array("a","e","i","o","u","a","e","i","o","u","a","e","i","o","u","n","","","","","","","","","",'');
    $login = str_replace($b,$c,$login);
    return $login;
}
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

function hora()
{
	$gmt_peru = -5;
	$fecha_gmt = gmmktime(gmdate("H")+$gmt_peru,gmdate("i"),gmdate("s"),gmdate("n"),gmdate("j"),gmdate("Y"));
	$hora = gmdate('H:i:s',$fecha_gmt);
	return $hora;
}

?>
<?php 
	include_once('../../config/conexion.php');
	include_once('../../recursos/includes.php');
	$retorno = include_once('controlador.php');

	echo $retorno ? "1" : "0";
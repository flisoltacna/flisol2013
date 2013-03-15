<?php
	require_once '../../config/conexion.php';
	require_once('../../recursos/funciones.php');

	if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['email']) && !empty($_POST['email'])){
		$nombre=utf8_decode($_POST["nombre"]);
		$apellidos=utf8_decode($_POST["apellidos"]);
		$dni=$_POST["dni"];
		$email=$_POST["email"];
		$fono=$_POST["fono"];
		$organizacion=$_POST["organizacion"];
		$fecha = fecha_hora();

		if(consulta("INSERT INTO inscriptos(nombres,apellidos,dni,email,telefono,organizacion,fecha_registro) VALUES('".$nombre."','".$apellidos."',".$dni.",'".$email."',".$fono.", '".$organizacion."','".$fecha."' )")){
			
		}
		
	}
?>
<?php

	function agregar_inscripcion($nombres,$apellidos,$fecha,$email,$dni,$telefono,$institucion,$certificado,$asistencia){

		return consulta("INSERT INTO inscriptos (dni,nombres,apellidos,email,telefono,organizacion,fecha_registro,certificado,asistencia) 
					VALUES ('".$dni."','".$nombres."','".$apellidos."','".$email."','".$telefono."','".$institucion."','".$fecha."','".$certificado."','".$asistencia."')");
	} 

	function actualizar_inscripcion($nombres,$apellidos,$email,$dni,$telefono,$institucion,$certificado,$id,$asistencia){

		return consulta("UPDATE inscriptos SET nombres='".$nombres."',apellidos='".$apellidos."',email='".$email."',dni='".$dni."',telefono='".$telefono."',organizacion='".$institucion."',certificado='".$certificado."',asistencia='".$asistencia."' WHERE id='".$id."' ");
	}

	function eliminar_inscripcion($id_inscripto){
		return consulta("DELETE FROM inscriptos WHERE id = '".$id_inscripto."'");
	}

	function actualizar_asistencia($id, $valor) {
		return consulta("UPDATE inscriptos SET asistencia = '$valor' WHERE id = '$id'");
	}

	function actualizar_certificado($id, $valor) {
		return consulta("UPDATE inscriptos SET certificado = '$valor' WHERE id = '$id'");
	}
?>
<?php

	function agregar_inscripcion($nombres,$apellidos,$fecha,$email,$dni,$telefono,$institucion,$certificado){

		return consulta("INSERT INTO inscriptos (dni,nombres,apellidos,email,telefono,organizacion,fecha_registro,certificado) 
					VALUES ('".$dni."','".$nombres."','".$apellidos."','".$email."','".$telefono."','".$institucion."','".$fecha."','".$certificado."')");
	} 

	function actualizar_inscripcion($nombres,$apellidos,$email,$dni,$telefono,$institucion,$certificado,$id){

		return consulta("UPDATE inscriptos SET nombres='".$nombres."',apellidos='".$apellidos."',email='".$email."',dni='".$dni."',telefono='".$telefono."',organizacion='".$institucion."',certificado='".$certificado."' WHERE id='".$id."' ");
	}

	function eliminar_inscripcion($id_inscripto){
		return consulta("DELETE FROM inscriptos WHERE id = '".$id_inscripto."'");
	}
?>
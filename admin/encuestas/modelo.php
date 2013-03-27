
<?php 
	function crear_encuesta($titulo,$descripcion,$fecha,$id_usuario){

		return consulta("INSERT INTO encuestas (encuesta_titulo,descripcion,fecha_creacion,usuario_id) 
					VALUES ('".$titulo."','".$descripcion."','".$fecha."','".$id_usuario."')");
	}

	function insertar_pregunta($pregunta,$encuesta,$condicion){
		return consulta ("INSERT INTO preguntas (formulacion_pregunta,obligatoria,encuesta_id) VALUES ('".$pregunta."','".$condicion."','".$encuesta."')");
	}

	function insertar_opcion($opcion,$id){
		return consulta("INSERT INTO opciones (opcion_respuesta,pregunta_id) VALUES ('".$opcion."','".$id."')");
	}

	function eliminar_pregunta($id_pregunta){
		return consulta("DELETE FROM preguntas WHERE id = '".$id_pregunta."'");
	}

	function insertar_asignacion($encuesta,$grupo,$activo){
		return consulta("INSERT INTO asignaciones (encuesta_id,grupo_id,activo) VALUES ('".$encuesta."','".$grupo."','".$activo."')");
	}

	function eliminar_asignacion($id_asignacion){
		return consulta("DELETE FROM asignaciones WHERE id = '".$id_asignacion."'");	
	}

	function votar_opcion($opcion,$valor){
		return consulta("UPDATE opciones SET votos = '".$valor."' WHERE id = '".$opcion."'");
	}

?>

<?php 
	function agregar_publicacion($titulo,$descripcion,$fecha,$id_usuario){

		return consulta("INSERT INTO publicaciones (titulo,descripcion,fecha_registro,usuario_id) 
					VALUES ('".$titulo."','".$descripcion."','".$fecha."','".$id_usuario."')");
	}

	function actualizar_publicacion($titulo,$descripcion,$id){

		return consulta("UPDATE publicaciones SET titulo='".$titulo."',descripcion='".$descripcion."' WHERE id='".$id."' ");
	}

	function eliminar_publicacion($id_publicacion){
		return consulta("DELETE FROM publicaciones WHERE id = '".$id_publicacion."'");
	}


?>
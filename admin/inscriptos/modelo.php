<?php 
	function eliminar_inscripcion($id_inscripto){
		return consulta("DELETE FROM inscriptos WHERE id = '".$id_inscripto."'");
	}
?>
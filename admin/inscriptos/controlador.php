<?php 
	require_once('modelo.php');

	if(isset($_GET['opcion'])){
		if($_GET['opcion']=='eliminar'){
			$id_inscripto=$_GET['id'];
		
			if(eliminar_inscripcion($id_inscripto)){
				header("location:index.php?mensaje=1");
			}
			else{
				header("location:index.php?mensaje=2");	
			}
		}
	}
	
?>
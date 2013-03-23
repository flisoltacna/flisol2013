<?php 
	require_once('modelo.php');

	if(isset($_POST['agregar_inscripcion'])){
		$nombres=strtoupper(utf8_decode($_POST["nombres"]));
		$apellidos=strtoupper(utf8_decode($_POST["apellidos"]));
		$fecha = fecha_hora();
		$email = $_POST['email'];
		$dni = $_POST['dni'];
		$telefono = $_POST['telefono'];
		$institucion = $_POST['institucion'];
		
		if(isset($_POST['certificado'])){
			$certificado = $_POST['certificado'];
		}
		else{
			$certificado = 0;
		}

		if(agregar_inscripcion($nombres,$apellidos,$fecha,$email,$dni,$telefono,$institucion,$certificado)){
			header("location:index.php?mensaje=1");
		}
		else{
			header("location:index.php?mensaje=2");	
		}	
	}

	if(isset($_POST['actualizar_inscripcion'])){
		$nombres=strtoupper(utf8_decode($_POST["nombres"]));
		$apellidos=strtoupper(utf8_decode($_POST["apellidos"]));
		$email = $_POST['email'];
		$dni = $_POST['dni'];
		$telefono = $_POST['telefono'];
		$institucion = $_POST['institucion'];
		$id = $_POST['id_inscripto'];
		if(isset($_POST['certificado'])){
			$certificado = $_POST['certificado'];
		}
		else{
			$certificado = 0;
		}

		if(actualizar_inscripcion($nombres,$apellidos,$email,$dni,$telefono,$institucion,$certificado,$id)){
			header("location:index.php?mensaje=1");
		}
		else{
			header("location:index.php?mensaje=2");	
		}	
	}

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
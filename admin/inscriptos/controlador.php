<?php 
	require_once('modelo.php');
	require_once('../../recursos/funciones.php');

	if(isset($_POST['agregar_inscripcion'])){
		$nombres=ucfirst_upp($_POST["nombres"]);
		$apellidos=ucfirst_upp($_POST["apellidos"]);
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

		if(isset($_POST['asistencia'])){
			$asistencia = $_POST['asistencia'];
		}
		else{
			$asistencia = 0;
		}

		if(agregar_inscripcion($nombres,$apellidos,$fecha,$email,$dni,$telefono,$institucion,$certificado,$asistencia)){
			header("location:index.php?mensaje=1");
		}
		else{
			header("location:index.php?mensaje=2");	
		}	
	}

	if(isset($_POST['actualizar_inscripcion'])){
		$nombres=ucfirst_upp($_POST["nombres"]);
		$apellidos=ucfirst_upp($_POST["apellidos"]);
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

		if(isset($_POST['asistencia'])){
			$asistencia = $_POST['asistencia'];
		}
		else{
			$asistencia = 0;
		}

		if(actualizar_inscripcion($nombres,$apellidos,$email,$dni,$telefono,$institucion,$certificado,$id,$asistencia)){
			header("location:index.php?mensaje=1");
		}
		else{
			header("location:index.php?mensaje=2");	
		}	
	}

	if(isset($_POST['opcion'])){
		if($_POST['opcion']=='eliminar'){
			$ids=$_POST['id'];
			$inscriptos = explode(',', $ids);
			if(!empty($inscriptos)){
				foreach ($inscriptos as $inscripto) {
					eliminar_inscripcion($inscripto);
				}
				header("location:index.php?mensaje=1");
			}else{
				header("location:index.php?mensaje=2");		
			}
		}
	}
	
?>
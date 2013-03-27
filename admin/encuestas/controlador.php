<?php 
	require_once('modelo.php');

	if(isset($_POST['guardar_encuesta'])){
		$titulo = utf8_decode($_POST['titulo']);
		$descripcion = utf8_decode($_POST['descripcion']);
		$fecha = fecha_hora();
		$id_usuario = $_POST['usuario'];
		if(crear_encuesta($titulo,$descripcion,$fecha,$id_usuario)){
			$encuesta_temp=query("SELECT id FROM encuestas WHERE fecha_creacion='".$fecha."'");
			$id_encuesta = $encuesta_temp['id'];
			header("location:preguntas.php?id=$id_encuesta");
		}
	}

	if(isset($_POST['votar'])){
		$opciones = $_POST['opcion'];

		foreach ($opciones as $opcion) {
			$votos = query("SELECT * FROM opciones WHERE id ='".$opcion."'");
			$valor = $votos['votos'] + 1;
			if(votar_opcion($opcion,$valor)){
				$cen=1;
			}
			else{
				$cen=0;
			}
		}

		if($cen){
			header("location:finalizar.php");
		}
		else{
			
		}
	}

	if(isset($_POST['btn-addpregunta'])){
		$pregunta = utf8_decode($_POST['pregunta']);
		$encuesta =  $_POST['id_encuesta'];
		$condicion = $_POST['condicion'];
		$opciones = $_POST['opcion'];

		if(insertar_pregunta($pregunta,$encuesta,$condicion)){
			$pregunta_temp = query("SELECT MAX(id) AS id FROM preguntas");
			$id = $pregunta_temp['id'];
			foreach ($opciones as $opcion) {
				if(insertar_opcion($opcion,$id)){
					$cen=1;
				}
				else{
					$cen=0;
				}
			}
		}
		if($cen){
			header("location:preguntas.php?msjpregunta=1&id=$encuesta");
		}
		else{
			header("location:preguntas.php?msjpregunta=2&id=$encuesta");
		}

	}

	if(isset($_GET['opcion'])){
		if($_GET['opcion']=='eliminar'){
			$id_pregunta=$_GET['pregunta'];
			$pregunta = query("SELECT * FROM preguntas WHERE id = $id_pregunta");
			$id_encuesta = $pregunta['encuesta_id'];
			if(eliminar_pregunta($id_pregunta)){
				header("location:preguntas.php?msjdelete=1&id=$id_encuesta");
			}
			else{
				header("location:preguntas.php?msjdelete=2&id=$id_encuesta");	
			}
		}
	}
	
	if(isset($_GET['opcion'])){
		if($_GET['opcion']=='delete_asig'){
			$id_asignacion=$_GET['id'];
			$asignacion = query("SELECT * FROM asignaciones WHERE id = $id_asignacion");
			$id_encuesta = $asignacion['encuesta_id'];
			if(eliminar_asignacion($id_asignacion)){
				header("location:asignar.php?msjasignacion=1&id=$id_encuesta");
			}
			else{
				header("location:asignar.php?msjasignacion=2&id=$id_encuesta");	
			}
		}
	}

	if(isset($_POST['asignar_encuesta'])){
		$encuesta = $_POST['encuesta'];
		$grupo = $_POST['grupo'];
		$activo = $_POST['activo'];

		if(insertar_asignacion($encuesta,$grupo,$activo)){
			header("location:asignar.php?msjencuesta=1&id=$encuesta");
		}
		else{
			header("location:asignar.php?msjencuesta=2&id=$encuesta");	
		}
	}	
	
?>
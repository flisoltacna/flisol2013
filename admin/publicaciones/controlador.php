<?php 
	require_once('modelo.php');

	if(isset($_POST['guardar_publicacion'])){
		$titulo = utf8_decode($_POST['titulo']);
		$descripcion = utf8_decode($_POST['descripcion']);
		$fecha = fecha_hora();
		$id_usuario = $_POST['usuario'];
		if(agregar_publicacion($titulo,$descripcion,$fecha,$id_usuario)){
			header("location:index.php");
		}
	}

	if(isset($_POST['editar_publicacion'])){
		$titulo = utf8_decode($_POST['titulo']);
		$descripcion = utf8_decode($_POST['descripcion']);
		$id = $_POST['id_publicacion'];

		if(actualizar_publicacion($titulo,$descripcion,$id)){
			header("location:editar.php?id=$id");
		}	
	}

	if(isset($_GET['opcion'])){
		if($_GET['opcion']=='eliminar'){
			$id_publicacion=$_GET['publicacion'];
		
			if(eliminar_publicacion($id_publicacion)){
				header("location:index.php?mensaje=1");
			}
			else{
				header("location:index.php?mensaje=2");	
			}
		}
	}	
	
?>
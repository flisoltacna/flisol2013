<?php 
	require_once '../config/conexion.php';

	if(isset($_POST['btn_ingresar'])){
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];	
		$consulta = query("SELECT * FROM usuarios WHERE username = '$usuario' AND password = MD5('$password')");

		if($consulta){
			session_start();
			$_SESSION['session']=true;
			$_SESSION['usuario_id']=$consulta['id'];
			$url= URL_APP.'admin/encuestas';
			header("location:$url");
		}
		else{
			header("location:index.php");
		}
	}

?>
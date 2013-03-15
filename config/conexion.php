<?php require_once('config.php');?>
<?php
function conectar(){
	$conexion=mysql_connect(BD_HOST,BD_USUARIO,BD_PASSWORD);
	mysql_select_db(BD_NOMBRE,$conexion);
	return($conexion);
}

function desconectar(){
	mysql_close();
}
 
function consulta($consulta){
	conectar();
	return mysql_query($consulta);
	desconectar();
}
function query_data($consulta){
	conectar();
	$data=mysql_query($consulta);
	while($tupla=mysql_fetch_array($data)):
		$tuplas[]=$tupla;
	endwhile;
	return($tuplas);
	desconectar();
}

function query($consulta){
	conectar();
	$data=mysql_query($consulta);
	$tupla=mysql_fetch_array($data);
	return($tupla);
	desconectar();
}
?>
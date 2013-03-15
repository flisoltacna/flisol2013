<?php function head(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Flisol 2013</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Festival latinoamericano de instalacion de Software libre 2013 - Flisol tacna">
	<meta name="author" content="comunidad de software libre Basadrinux">
	<link href="<?php echo URL_APP;?>recursos/img/icono.png" type="image/x-icon" rel="icon" />
	<link href="<?php echo URL_APP;?>recursos/img/icono.png" type="image/x-icon" rel="shortcut icon" />
	<link href="<?php echo URL_APP;?>recursos/img/favicon.ico" type="image/x-icon" rel="icon" />
	<link href="<?php echo URL_APP;?>recursos/img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL_APP;?>recursos/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL_APP;?>recursos/css/estilo.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL_APP;?>recursos/css/bootstrap-responsive.min.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="<?php echo URL_APP;?>recursos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo URL_APP;?>recursos/js/ckeditor/ckeditor.js"></script>
	<!--<script src="<?php //echo URL_APP;?>recursos/js/jquery.dataTables.js"></script>
	<script src="<?php //echo URL_APP;?>recursos/js/script.js"></script>-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->	
</head>
<?php 
	session_start(); 
	if(!isset($_SESSION['session'])):
		header("location: ../index.php");
	endif;
?>
<body>
<?php };?>
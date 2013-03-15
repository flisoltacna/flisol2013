<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8" />
		<title>Universidad Nacional Jorge Basadre Grohmann</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
	    <meta name="robots" content="" />
	    <meta name="keywords" content="" />
	    <meta name="description" content="" />
		<meta name="author" content="" />
		<link href="recursos/img/favicon.ico" type="image/x-icon" rel="icon" />
		<link href="recursos/img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../recursos/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../recursos/css/estilo.css">
		<link rel="stylesheet" type="text/css" href="../recursos/css/bootstrap-responsive.min.css" />
		
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	  	</head>
	<body> 
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">	
					<a class="brand" href="#">ESIS - UNJBG</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row-fluid">
				<section class="login-container"><!-- login -->
					<div class="login-header">
						<h3>Login</h3>
					</div>
					<div class="login-content">		
						<form action="verificar.php" method="post" accept-charset="utf-8">
							<fieldset>
								<div class="control-group">
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on"><i class="icon-large icon-user"></i></span>
											<input name="usuario" class="input-large" maxlength="45" type="text" placeholder="Usuario" required="required"/>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<div class="input-prepend">
											<span class="add-on"><i class="icon-large icon-lock"></i></span>
											<input name="password" class="input-large" type="password" placeholder="Password" required="required"/>
										</div>
									</div>
								</div>
								<div class="pull-right">
									<button type="submit" name="btn_ingresar" class="btn btn-primary">Iniciar Sesión</button>
								</div>
							</fieldset>
						</form>
					</div>
				</section>					
			</div>
		</div>
	</body>
</html>

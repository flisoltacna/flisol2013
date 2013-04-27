<?php 
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');
?>
<?php 
	head();
	menu("informe");
?>
	<div class="container">
		<form method="POST" action="informe.php" target="_blank">
			<ul class="breadcrumb">
				<li><a href="#"><i class="icon-home"></i></a><span class="divider">/</span>
				</li>
		    	<li><a href="#">Home</a> <span class="divider">/</span></li>
		    	<li class="active">Informe</li>
	    	</ul>	
	    	<div class="row-fluid">
	    		<div class="span12">
	    			<div class="box">
	    				<h4 class="box-header round-top">Detalles del Informe</h4>
	    				<div class="box-content">
	    					<div class="row-fluid">
	    						<div class="span7">
									<dl>
										<dt>ASISTENTES</dt>
										<dd>
											<label style="display: inline">
												<input type="checkbox" name="ausentes" style="margin: 0" /> Considerar a las personas que no asistieron
											</label>
										</dd>
									</dl>

									<dl>
										<dt>CERTIFICADO</dt>
										<dd>
											<label style="display: inline">
												<input type="checkbox" name="sin_certificado" style="margin: 0" checked /> Considerar a quienes no adquirieron certificado
											</label>
										</dd>
									</dl>

									<dl>
										<dt>ORDENAR POR</dt>
										<dd>
											<select name="orden">
												<option value="1">ID</option>
												<option value="2">DNI</option>
												<option value="3" selected>Apellidos y nombres</option>
											</select>
										</dd>
									</dl>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>
    		<input type="submit" class="btn btn-primary" style="padding-top:6px; padding-bottom:6px;" value="Generar informe" />
    	</form>
		<p><br /></p>
	</div> <!-- /container -->
<?php footer();?>
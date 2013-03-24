<?php 
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');
	require_once('controlador.php');
?>
<?php 
	head();
	menu("inscriptos");
?>
	<div class="container">		
		<ul class="breadcrumb">
			<li><a href="#"><i class="icon-home"></i></a><span class="divider">/</span></li>
	    	<li class="active">Inscriptos</li>
    	</ul>
		<?php 
			if(isset($_GET['mensaje'])){
				switch ($_GET['mensaje']) {
					case 1: alertas("La operación se llevo correctamente.",1); break;
					case 2: alertas("La operación no se completo. Intente de nuevamente",2); break;
				}		
			}
		?>
		<section>
			<a href="agregar.php" class="btn btn-primary">
				<i class="icon-plus icon-white"></i> Agregar
			</a>
			<form action="editar.php" method="GET" id="form-editar" class="form-horizontal">
				<button class="btn"><i class="icon-pencil"></i> Editar</button>
				<input type="hidden" name="id" value="" class="inscripto_id" />
			</form>
			<form action="index.php" method="POST" id="form-eliminar" class="form-horizontal">
				<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Eliminar</button>
				<input type="hidden" name="opcion" value="eliminar" />
				<input type="hidden" name="id" value="" class="inscripto_id" />
			</form>
			<a href="agregar.php" class="btn btn-info">
				<i class="icon-envelope icon-white"></i> Enviar mensaje
			</a>
		</section>
    	<?php $inscriptos = @query_data("SELECT * FROM inscriptos");?>
    	<section>
    		<div class="box">
    			<h4 class="box-header round-top">Gestión de Inscriptos</h4>
    			<div class="box-content">
    				<table id="dataTable" class="table table-striped table-bordered">
    					<thead>
    						<th><input type="checkbox" id="seleccionados"/></th>
    						<th>#</th>
    						<th>Nombres y Apellidos</th>
    						<th>Email</th>
    						<th>Teléfono</th>
    						<th>Fecha de registro</th>
    					</thead>
    					<tbody>
    					<?php if(!empty($inscriptos)):?>
    					<form id="form-inscriptos">
    					<?php foreach ($inscriptos as $inscripto): ?>
						<tr> 
							<td><input type="checkbox" name="inscriptoid" value="<?php echo $inscripto['id'];?>"></td>
							<td><?php echo $inscripto['id']; ?></td>
							<td>
								<?php echo utf8_encode($inscripto['nombres'].' '.$inscripto['apellidos']); ?>
								<?php if($inscripto['certificado']):?>
									<span class="label label-success pull-right">Con certificado</span>
								<?php else: ?>
									<span class="label label-important pull-right">Sin certificado</span>
								<?php endif;?>
							</td>
							<td><?php echo utf8_encode($inscripto['email']); ?></td>
							<td><?php echo utf8_encode($inscripto['telefono']); ?></td>
							<td>
							<?php setlocale(LC_TIME, "spanish");
								$fecha = strftime(" %d/%m/%y %H:%M:%S ",strtotime($inscripto['fecha_registro']));
								echo $fecha;
							?>
							</td>
						</tr>
						<?php endforeach; ?>
						</form>
						<?php endif;?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</section>
	</div> <!-- /container -->
	<script type="text/javascript">
		$("#seleccionados").click(function(){
	     	if($(this).is(":checked")) {
		 		$("input[type=checkbox]:not(:checked)").attr("checked", "checked");
		 	}else{
				 $("input[type=checkbox]:checked").removeAttr("checked");
		 	}
	   });	

		//boton editar y eliminar
		jQuery.fn.getCheckboxValues = function(){
		    var values = [];
		    var i = 0;
		    this.each(function(){
		        values[i++] = $(this).val();
		    });
		    return values;
		}

		$("#form-editar").submit(function(event){
			var array = $("input[name=inscriptoid]:checked").getCheckboxValues();
			if(array.length != 0){
				if(array.length == 1){
					$("#form-editar .inscripto_id").attr('value', array[0]);	
				}else{
					alert("Solo puede seleccionar uno");
					$("input[type=checkbox]:checked").removeAttr("checked");		
				}
			}
			if($("#form-editar .inscripto_id").val() == ""){
				event.preventDefault();
				event.stopPropagation();
			}
		});

		$("#form-eliminar").submit(function(event){
			var array = $("input[name=inscriptoid]:checked").getCheckboxValues();
			if(array.length != 0){
				$("#form-eliminar .inscripto_id").attr('value', array);	
			}
			if($("#form-eliminar .inscripto_id").val() == ""){
				event.preventDefault();
				event.stopPropagation();
			}
		});		
	</script>
	<style type="text/css">
		.form-horizontal{
			display:inline-block
		}
	</style>
<?php footer();?>
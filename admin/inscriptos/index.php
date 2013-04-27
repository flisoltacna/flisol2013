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
			<form action="../mensajes/index.php" method="POST" id="form-mensajes" class="form-horizontal">
				<button class="btn btn-info"><i class="icon-envelope icon-white"></i> Enviar mensaje</button>
				<input type="hidden" name="ids" value="" class="inscripto_id" />
			</form>
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
    						<th>Asistencia</th>
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
								<?php echo $inscripto['nombres'].' '.$inscripto['apellidos']; ?>
								<?php if($inscripto['certificado'] == 1):?>
									<span name="certificado" title="Cancelar certificado" class="label label-success pull-right" data-id="<?php echo $inscripto['id']; ?>">Con certificado</span>
								<?php else: ?>
									<span name="certificado" title="Asignar certificado" class="label label-important pull-right" data-id="<?php echo $inscripto['id']; ?>">Sin certificado</span>
								<?php endif;?>
							</td>
							<td class="center">
								<label style="display:inline; width: 100%">
									<?php if($inscripto['asistencia'] == 1): ?>
										<input type="checkbox" name="asistencia" style="width: 100%" title="Desmarcar asistencia" checked data-id="<?php echo $inscripto['id']; ?>" />
									<?php else: ?>
										<input type="checkbox" name="asistencia" style="width: 100%" title="Marcar asistencia" data-id="<?php echo $inscripto['id']; ?>" />
									<?php endif; ?>
								</label>
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

		//boton para enviar mensajes
		$("#form-mensajes").submit(function(event){
			var array = $("input[name=inscriptoid]:checked").getCheckboxValues();
			if(array.length != 0){
				$("#form-mensajes .inscripto_id").attr('value', array);	
			}
			if($("#form-mensajes .inscripto_id").val() == ""){
				event.preventDefault();
				event.stopPropagation();
			}
		});

		// Para la confirmación y cancelación de asistencia
		$("input[name='asistencia']").change(function (event) {
			$(this).attr("disabled", true);
			$.ajax({
				url: "verificar.php?accion=1&id=" + $(this).data("id") + "&valor=" + ($(this).attr("checked") ? "1" : "0"),
				context: this
			}).done(function (data) {
				if (data == "1") {
					alertify.success("Actualizado correctamente");
				} else {
					alertify.error("Ocurrió un error");
					$(this).attr("checked", !$(this).attr("checked"));
				}
			}).fail(function () {
				alertify.error("Ocurrió un error");
				$(this).attr("checked", !$(this).attr("checked"));
			}).always(function () {
				$(this).attr("disabled", false);
				if ($(this).attr("checked")) {
					$(this).attr("title", "Desmarcar asistencia");
				} else {
					$(this).attr("title", "Marcar asistencia");
				}
			});
		});

		// Para la asignación y cancelación de certificado
		$("span[name='certificado']").click(function (event) {
			if ($(this).text() == "Procesando") return ;

			var certificado = ($(this).text() == "Con certificado");

			if (certificado) {
				if (!confirm("¿Está seguro que desea cancelar el certificado?")) return ;
			}

			$(this).removeClass("label-success").removeClass("label-important").addClass("label-warning").text("Procesando").attr("title" ,"Procesando");

			$.ajax({
				url: "verificar.php?accion=2&id=" + $(this).data("id") + "&valor=" + (!certificado ? "1" : "0"),
				context: this
			}).done(function (data) {
				if (data == "1") {
					alertify.success("Actualizado correctamente");
					cambiarEtiqueta(!certificado, this);
				} else {
					alertify.error("Ocurrió un error");
					cambiarEtiqueta(certificado, this);
				}
			}).fail(function () {
				alertify.error("Ocurrió un error");
				cambiarEtiqueta(certificado, this);
			});
		});

		alertify.set({delay: 2000});

		function cambiarEtiqueta(certificado, obj) {
			if (certificado) {
				$(obj).removeClass("label-warning").addClass("label-success").text("Con certificado").attr("title", "Cancelar certificado");
			} else {
				$(obj).removeClass("label-warning").addClass("label-important").text("Sin certificado").attr("title", "Asignar certificado");
			}
		}
	</script>
	<style type="text/css">
		.form-horizontal{
			display:inline-block
		}
		span[name='certificado'] {
			cursor: pointer;
		}
	</style>
<?php footer();?>
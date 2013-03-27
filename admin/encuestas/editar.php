<?php 
	require_once('../../config/conexion.php');
	require_once('../../recursos/includes.php');
	require_once('controlador.php'); 
?>
<?php 
	head();
	menu("encuestas");
?>
	<div class="container">		
		<ul class="breadcrumb">
			<li><a href="#"><i class="icon-home"></i></a><span class="divider">/</span>
			</li>
	    	<li><a href="#">Home</a> <span class="divider">/</span></li>
	    	<li><a href="../encuestas">Encuestas</a> <span class="divider">/</span></li>
	    	<li class="active">Preguntas</li>
    	</ul>

    	<div class="row-fluid">
	    	<div class="span12">
	    		<div class="page-header">
					<h1>Encuestas
						<small>Agregar Preguntas</small>
					</h1>
				</div>
			</div>
		</div>
		<?php 
			$id = $_GET['id'];
			$preguntas = @query_data("SELECT * FROM preguntas WHERE encuesta_id = $id");
		?>

		<div class="well">
			<?php if(!empty($preguntas)){ ?>
			<ul class="listado">
				<?php $i=1;?>
				<?php foreach ($preguntas as $pregunta) {?>
					<li>
						<a href="preguntas.php?opcion=eliminar&pregunta=<?php echo $pregunta['id'];?>" class="delete" onclick="return confirm('¿Está seguro?');">Eliminar</a>
						
						<h6><?php echo $i.'. '. utf8_encode($pregunta['formulacion_pregunta']);?></h6>
						<div class="opciones">
							<?php
								$id_pregunta = $pregunta['id'];
								$opciones = @query_data("SELECT * FROM opciones WHERE pregunta_id = $id_pregunta");
								
								if(!empty($opciones)){
									foreach ($opciones as $opcion) {
										echo '<div class="radio"><input type ="radio" name="opciones"/>'.$opcion['opcion_respuesta'].'</div>';
									}
								}				
							?>
						</div>
					</li>

				<?php $i++; };?>
			</ul>
			<?php };?>
			<form action="preguntas.php" method="post" id="PreguntasAdd" accept-charset="utf-8">
				<input type="hidden" name="id_encuesta" value="<?php echo $id;?>"> 
				<div class="control-group">
    				<label for="preguntaformulacion">Formule la pregunta</label>
    				<div class="controls">
    					<input name="pregunta" class="span8" maxlength="120" type="text" id="preguntaformulacion" required="required" />
    				</div>
    			</div>
    			<div class="control-group">
    				<label>Respuestas</label>
    				<div class="controls">
    					<input type="text" name="opcion[0]" class="span4" style="margin-bottom: 2px;" maxlength="140" value="Si" required="required"><br/>
        				<input type="text" name="opcion[1]" class="span4" style="margin-bottom: 2px;" maxlength="140" value="No" required="required"><br/>
        					<button href="javascript:void(0);" class="btn" id="padd">Añadir respuesta</button>
        			</div>
    			</div>
    			<div class="control-group">
    				<label class="checkbox inline">
						<input type="checkbox" name="condicion" value="1">Obligatoria
					</label>
    			</div>
    			<button type="submit" name="btn-addpregunta" class="btn btn-success">Agregar pregunta</button>
    			<a href="index.php" class="btn btn-primary" >Finalizar encuesta</a>
			</form>
		</div>

    </div><!-- container-->

    <?php footer();?>

<script type="text/javascript">
	// add answer ✔
    jQuery.fn.padd = function (id, index) {
        $(this).each(function () {
            var elem = $(this);
            elem.data('id', id);
            elem.data('index', index);

            elem.click(function (e) {
                e.preventDefault();
                var obj_id = $(this).data('id') + $(this).data('index');
                var obj_insert = '<div style="diplay:block"><input type="text" required="required" class="span4" style="margin-bottom:2px;" maxlength="140" name="'+ id +'[' + index + ']" id="' + obj_id + '" /><button class="btn btn-danger" style="margin-left: 3px;" onclick="$(\'#padd\').show();$(\'#' + obj_id + '\').remove(); $(this).remove(); return false;"><i class="icon-remove icon-white"></i></button></div>';
                index ++;
                $(this).data('index', index);
                elem.before($(obj_insert));

                if ($('input[type=text]').length > 13) $('#padd').hide();
            });
          
        });
        return this;
    };
    $('#padd').padd('opcion',  2);
</script>    
	


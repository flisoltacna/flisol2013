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
	    	<li class="active">Resultados</li>
    	</ul>
    	<?php 
			$id = $_GET['id'];
			$encuesta = @query("SELECT * FROM encuestas WHERE id = $id");
			$preguntas = @query_data("SELECT * FROM preguntas WHERE encuesta_id = $id");
		?>
    	<div class="row-fluid">
	    	<div class="span12">
	    		<div class="page-header">
					<h3><?php echo utf8_encode($encuesta['encuesta_titulo']);?>
						<small>Resultados</small>
					</h3>
				</div>
			</div>
		</div>
		
		<div>
			<?php if(!empty($preguntas)){ ?>
			<ul class="listado-report">
				<?php $i=1;?>
				<?php foreach ($preguntas as $pregunta) {?>
					<li>
						<h6><?php echo $i.'. '. utf8_encode($pregunta['formulacion_pregunta']);?></h6>
						
						<div id="chartcont<?php echo $pregunta['id'];?>" style="width: 75%; height: 250px;margin-left:135px;" ></div>
						<div id="chartdiv<?php echo $pregunta['id'];?>" style="width: 100%; height: 450px;" ></div>
					</li>
				<?php $i++; };?>
			</ul>
			<?php };?>
		</div>
	</div><!-- container -->

<script type="text/javascript">

	var chart;

	<?php foreach($preguntas as $pregunta):?>	
		AmCharts.ready(function () {
		// PIE CHART
		chart = new AmCharts.AmPieChart();
		chart.dataProvider = [
			<?php 
				$id_pregunta = $pregunta['id'];
				$opciones = @query_data("SELECT * FROM opciones WHERE pregunta_id = $id_pregunta");
				$k = 1;
			?>	
			<?php foreach($opciones as $opcion):?>
			{
			opcion: "<?php echo $opcion['opcion_respuesta'];?>",
			value: <?php echo $opcion['votos'];?>
			}
				<?php if($k != count($opciones)):?>
				,
				<?php endif;?>
			<?php $k++; ?>
			<?php endforeach;?>
		];

		chart.titleField = "opcion";
        chart.valueField = "value";

        chart.outlineColor = "#FFFFFF";
        chart.outlineAlpha = 0.3;
                
        chart.labelRadius = 30;
        chart.labelText = "[[percents]]%";

        chart.outlineThickness = 2;
        // this makes the chart 3D
        chart.depth3D = 15;
     	chart.angle = 35;
		
		//Legend
		var legend = new AmCharts.AmLegend();
		legend.position = "bottom";
		chart.addLegend(legend);

		// WRITE
		chart.write("chartdiv<?php echo $pregunta['id'];?>");
		});
	<?php endforeach;?>
</script>


<script type="text/javascript">

	var chart;

	<?php foreach($preguntas as $pregunta):?>	
		AmCharts.ready(function () {
		// PIE CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = [
			<?php 
				$id_pregunta = $pregunta['id'];
				$opciones = @query_data("SELECT * FROM opciones WHERE pregunta_id = $id_pregunta");
				$k = 1;
			?>	
			<?php foreach($opciones as $opcion):?>
			{
			opcion: "<?php echo $opcion['opcion_respuesta'];?>",
			votos: <?php echo $opcion['votos'];?>,
			<?php switch ($k) {
				case 1: $color = "#FF0F00"; break;
				case 2: $color = "#FF6600"; break;
				case 3: $color = "#FF9E01"; break;
				case 4: $color = "#FCD202"; break;
				case 5: $color = "#F8FF01"; break;
				default: $color = "#B0DE09";  break;
			}?>
			color: "<?php echo $color;?>"
			}
				<?php if($k != count($opciones)):?>
				,
				<?php endif;?>
			<?php $k++; ?>
			<?php endforeach;?>
		];

		chart.categoryField = "opcion";

        // the following two lines makes chart 3D
        chart.depth3D = 20;
        chart.angle = 30;

         // AXES
         // category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 50;
		categoryAxis.labelsEnabled = false;
		categoryAxis.gridPosition = "start";

        // value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		chart.addValueAxis(valueAxis);
                
         // GRAPH            
		var graph = new AmCharts.AmGraph();
		graph.valueField = "votos";
		graph.colorField = "color";
		graph.balloonText = "[[category]]: [[value]]";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);

		// WRITE
		chart.write("chartcont<?php echo $pregunta['id'];?>");
		});
	<?php endforeach;?>
</script>
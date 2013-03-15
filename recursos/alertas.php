<?php
/* Datos:
	1->success
	2->error 
	3->info
	4->Warning
*/
?>
<?php function alertas($mensaje=' ',$tipo){ ?>
	<?php $alertas = array(1=>'alert  alert-success',2=>'alert  alert-error',3=>'alert  alert-info',4=>'alert');?>
	<div class="<?php echo $alertas[$tipo];?>">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $mensaje;?>
   	</div>
<?php };?>
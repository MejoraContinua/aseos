<?php
/* @var $this EstadoController */
/* @var $data Estado */
?>

<div class="view">

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_ESTADO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRE_ESTADO), array('view', 'id'=>$data->ID_ESTADO)); ?>
	<br />


</div>
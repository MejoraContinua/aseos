<?php
/* @var $this ItemController */
/* @var $data Item */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRE), array('view', 'id'=>$data->ID_ITEM)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVALUACION_ID_EVALUACION')); ?>:</b>
	<?php echo CHtml::encode($data->eVALUACIONIDEVALUACION->NOMBRE); ?>
	<br />


</div>
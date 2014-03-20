<?php
/* @var $this NotaController */
/* @var $data Nota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_NOTA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_NOTA), array('view', 'id'=>$data->ID_NOTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOTA')); ?>:</b>
	<?php echo CHtml::encode($data->NOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ITEM_ID_ITEM')); ?>:</b>
	<?php echo CHtml::encode($data->ITEM_ID_ITEM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TRABAJO_ID_TRABAJO')); ?>:</b>
	<?php echo CHtml::encode($data->TRABAJO_ID_TRABAJO); ?>
	<br />


</div>
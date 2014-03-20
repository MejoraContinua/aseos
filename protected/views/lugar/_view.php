<?php
/* @var $this LugarController */
/* @var $data Lugar */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('LUGAR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LUGAR), array('view', 'id'=>$data->ID_LUGAR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FILIAL_ID_FILIAL')); ?>:</b>
	<?php echo CHtml::encode($data->fILIALIDFILIAL->NOMBRE_FILIAL); ?>
	<br />


</div>
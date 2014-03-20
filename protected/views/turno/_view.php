<?php
/* @var $this TurnoController */
/* @var $data Turno */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TURNO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TURNO), array('view', 'id'=>$data->ID_TURNO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO_TURNO_ID_TIPO_TURNO')); ?>:</b>
	<?php echo CHtml::encode($data->TIPO_TURNO_ID_TIPO_TURNO); ?>
	<br />


</div>
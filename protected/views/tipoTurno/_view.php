<?php
/* @var $this TipoTurnoController */
/* @var $data TipoTurno */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TIPO), array('view', 'id'=>$data->ID_TIPO_TURNO)); ?>
	<br />


</div>
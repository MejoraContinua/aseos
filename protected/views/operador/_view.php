<?php
/* @var $this OperadorController */
/* @var $data Operador */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_OPERADOR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRE_OPERADOR), array('view', 'id'=>$data->ID_OPERADOR)); ?>
	<br />


</div>
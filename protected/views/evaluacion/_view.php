<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRE), array('view', 'id'=>$data->ID_EVALUACION)); ?>
	<br />


</div>
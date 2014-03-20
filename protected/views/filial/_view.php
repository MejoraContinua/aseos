<?php
/* @var $this FilialController */
/* @var $data Filial */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_FILIAL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMBRE_FILIAL), array('view', 'id'=>$data->ID_FILIAL)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS')); ?>:</b>
	<?php echo CHtml::encode($data->PAIS); ?>
	<br />


</div>
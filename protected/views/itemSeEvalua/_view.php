<?php
/* @var $this ItemSeEvaluaController */
/* @var $data ItemSeEvalua */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ISE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_ISE), array('view', 'id'=>$data->ID_ISE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FLOTA_ID_FLOTA')); ?>:</b>
	<?php echo CHtml::encode($data->fLOTAIDFLOTA->NOMBRE_FLOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASEO_ID_ASEO')); ?>:</b>
	<?php echo CHtml::encode($data->aSEOIDASEO->TIPO_ASEO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ITEM_ID_ITEM')); ?>:</b>
	<?php echo CHtml::encode($data->iTEMIDITEM->NOMBRE); ?>
	<br />


</div>
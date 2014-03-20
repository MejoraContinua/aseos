<?php
/* @var $this CRITICOSController */
/* @var $data CRITICOS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CRITICOS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_CRITICOS), array('view', 'id'=>$data->ID_CRITICOS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FLOTA_ID_FLOTA')); ?>:</b>
	<?php echo CHtml::encode($data->fLOTAIDFLOTA->NOMBRE_FLOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASEO_ID_ASEO')); ?>:</b>
	<?php echo CHtml::encode($data->aSEOIDASEO->TIPO_ASEO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIMITE1')); ?>:</b>
	<?php echo CHtml::encode($data->LIMITE1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIMITE2')); ?>:</b>
	<?php echo CHtml::encode($data->LIMITE2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIMITE3')); ?>:</b>
	<?php echo CHtml::encode($data->LIMITE3); ?>
	<br />


</div>
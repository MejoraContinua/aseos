<?php
/* @var $this PonderacionController */
/* @var $data Ponderacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PONDERACION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_PONDERACION), array('view', 'id'=>$data->ID_PONDERACION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PONDERACION')); ?>:</b>
	<?php echo CHtml::encode($data->PONDERACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASEO_ID_ASEO')); ?>:</b>
	<?php echo CHtml::encode($data->aSEOIDASEO->TIPO_ASEO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FLOTA_ID_FLOTA')); ?>:</b>
	<?php echo CHtml::encode($data->fLOTAIDFLOTA->NOMBRE_FLOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVALUACION_ID_EVALUACION')); ?>:</b>
	<?php echo CHtml::encode($data->eVALUACIONIDEVALUACION->NOMBRE); ?>
	<br />


</div>
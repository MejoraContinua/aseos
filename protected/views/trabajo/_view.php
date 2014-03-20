<?php
/* @var $this TrabajoController */
/* @var $data Trabajo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TRABAJO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TRABAJO), array('view', 'id'=>$data->ID_TRABAJO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OT')); ?>:</b>
	<?php echo CHtml::encode($data->OT ? $data->OT : 'No asignado'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AVION_MATRICULA')); ?>:</b>
	<?php echo CHtml::encode($data->AVION_MATRICULA ? $data->AVION_MATRICULA : 'No asignado'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUARIO_BP')); ?>:</b>
	<?php echo CHtml::encode($data->USUARIO_BP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLANIFICADO')); ?>:</b>
	<?php echo CHtml::encode($data->PLANIFICADO ? ($data->PLANIFICADO ? "Si" : "No") : "No asignado"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HORA_INICIO')); ?>:</b>
	<?php echo CHtml::encode($data->HORA_INICIO ? $data->HORA_INICIO : "No asignado"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HORA_TERMINO')); ?>:</b>
	<?php echo CHtml::encode($data->HORA_TERMINO ? $data->HORA_TERMINO : "No asignado"); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('COMENTARIO')); ?>:</b>
	<?php echo CHtml::encode($data->COMENTARIO ? $data->COMENTARIO : "No asignado"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA ? $data->FECHA : "No asignado"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CALIFICACION')); ?>:</b>
	<?php echo CHtml::encode($data->CALIFICACION ? $data->CALIFICACION : "No corresponde"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO_ID_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO_ID_ESTADO ? $data->eSTADOIDESTADO->NOMBRE_ESTADO : "No asignado"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LUGAR_ID_LUGAR')); ?>:</b>
	<?php echo CHtml::encode($data->LUGAR_ID_LUGAR ? $data->lUGARIDLUGAR->LUGAR : "No asignado"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASEO_ID_ASEO')); ?>:</b>
	<?php echo CHtml::encode($data->ASEO_ID_ASEO ? $data->aSEOIDASEO->TIPO_ASEO : "No asignado"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TURNO_ID_TURNO')); ?>:</b>
	<?php echo CHtml::encode($data->TURNO_ID_TURNO ? $data->tURNOIDTURNO->FECHA.' '.$data->tURNOIDTURNO->tIPOTURNOIDTIPOTURNO->TIPO : "No asignado"); ?>
	<br />


</div>
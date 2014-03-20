<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('BP')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->BP), array('view', 'id'=>$data->BP)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIVEL_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->NIVEL_USUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FILIAL_ID_FILIAL')); ?>:</b>
	<?php echo CHtml::encode($data->fILIALIDFILIAL->NOMBRE_FILIAL); ?>
	<br />


</div>
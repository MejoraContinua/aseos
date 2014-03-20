<?php
/* @var $this PonderacionController */
/* @var $model Ponderacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_PONDERACION'); ?>
		<?php echo $form->textField($model,'ID_PONDERACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PONDERACION'); ?>
		<?php echo $form->textField($model,'PONDERACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ASEO_ID_ASEO'); ?>
		<?php echo $form->dropDownList($model, 'ASEO_ID_ASEO', CHtml::listData(Aseo::model()->findAll(), 'ID_ASEO', 'TIPO_ASEO'), array('empty' => 'Seleccione')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model,'FLOTA_ID_FLOTA'); ?>
		<?php echo $form->dropDownList($model, 'FLOTA_ID_FLOTA', CHtml::listData(Flota::model()->findAll(), 'ID_FLOTA', 'NOMBRE_FLOTA'), array('empty' => 'Seleccione')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVALUACION_ID_EVALUACION'); ?>
		<?php echo $form->dropDownList($model, 'EVALUACION_ID_EVALUACION', CHtml::listData(Evaluacion::model()->findAll(), 'ID_EVALUACION', 'NOMBRE'), array('empty' => 'Seleccione')); ?>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
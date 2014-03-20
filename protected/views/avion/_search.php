<?php
/* @var $this AvionController */
/* @var $model Avion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'MATRICULA'); ?>
		<?php echo $form->textField($model,'MATRICULA',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FLOTA_ID_FLOTA'); ?>
		<?php echo $form->textField($model,'FLOTA_ID_FLOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OPERADOR_ID_OPERADOR'); ?>
		<?php echo $form->textField($model,'OPERADOR_ID_OPERADOR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
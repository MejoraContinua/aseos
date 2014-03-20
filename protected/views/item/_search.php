<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE'); ?>
		<?php echo $form->textField($model,'NOMBRE',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVALUACION_ID_EVALUACION'); ?>
		<?php echo $form->textField($model,'EVALUACION_ID_EVALUACION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
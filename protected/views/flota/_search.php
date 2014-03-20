<?php
/* @var $this FlotaController */
/* @var $model Flota */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_FLOTA'); ?>
		<?php echo $form->textField($model,'ID_FLOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_FLOTA'); ?>
		<?php echo $form->textField($model,'NOMBRE_FLOTA',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
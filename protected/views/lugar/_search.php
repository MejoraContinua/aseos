<?php
/* @var $this LugarController */
/* @var $model Lugar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'LUGAR'); ?>
		<?php echo $form->textField($model,'LUGAR',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FILIAL_ID_FILIAL'); ?>
		<?php echo $form->textField($model,'FILIAL_ID_FILIAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
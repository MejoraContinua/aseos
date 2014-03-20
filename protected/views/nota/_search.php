<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_NOTA'); ?>
		<?php echo $form->textField($model,'ID_NOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOTA'); ?>
		<?php echo $form->textField($model,'NOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ITEM_ID_ITEM'); ?>
		<?php echo $form->textField($model,'ITEM_ID_ITEM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TRABAJO_ID_TRABAJO'); ?>
		<?php echo $form->textField($model,'TRABAJO_ID_TRABAJO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
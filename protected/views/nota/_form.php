<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nota-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'NOTA'); ?>
		<?php echo $form->textField($model,'NOTA'); ?>
		<?php echo $form->error($model,'NOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ITEM_ID_ITEM'); ?>
		<?php echo $form->textField($model,'ITEM_ID_ITEM'); ?>
		<?php echo $form->error($model,'ITEM_ID_ITEM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TRABAJO_ID_TRABAJO'); ?>
		<?php echo $form->textField($model,'TRABAJO_ID_TRABAJO'); ?>
		<?php echo $form->error($model,'TRABAJO_ID_TRABAJO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this TurnoController */
/* @var $model Turno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turno-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'FECHA'); ?>
		<?php echo $form->textField($model,'FECHA'); ?>
		<?php echo $form->error($model,'FECHA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIPO_TURNO_ID_TIPO_TURNO'); ?>
		<?php echo $form->textField($model,'TIPO_TURNO_ID_TIPO_TURNO'); ?>
		<?php echo $form->error($model,'TIPO_TURNO_ID_TIPO_TURNO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
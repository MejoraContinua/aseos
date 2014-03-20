<?php
/* @var $this FlotaController */
/* @var $model Flota */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flota-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_FLOTA'); ?>
		<?php echo $form->textField($model,'NOMBRE_FLOTA',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'NOMBRE_FLOTA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
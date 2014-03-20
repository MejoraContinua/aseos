<?php
/* @var $this OperadorController */
/* @var $model Operador */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'operador-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_OPERADOR'); ?>
		<?php echo $form->textField($model,'NOMBRE_OPERADOR',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'NOMBRE_OPERADOR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
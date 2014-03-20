<?php
/* @var $this TipoTurnoController */
/* @var $model TipoTurno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-turno-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TIPO'); ?>
		<?php echo $form->textField($model,'TIPO',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TIPO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
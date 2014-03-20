<?php
/* @var $this AseoController */
/* @var $model Aseo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aseo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TIPO_ASEO'); ?>
		<?php echo $form->textField($model,'TIPO_ASEO',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'TIPO_ASEO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this FilialController */
/* @var $model Filial */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'filial-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_FILIAL'); ?>
		<?php echo $form->textField($model,'NOMBRE_FILIAL',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'NOMBRE_FILIAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PAIS'); ?>
		<?php echo $form->textField($model,'PAIS',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'PAIS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
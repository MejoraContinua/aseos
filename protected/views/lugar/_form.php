<?php
/* @var $this LugarController */
/* @var $model Lugar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'LUGAR'); ?>
		<?php echo $form->textField($model,'LUGAR',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'LUGAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FILIAL_ID_FILIAL'); ?>
		<?php echo $form->dropDownList($model, 'FILIAL_ID_FILIAL', CHtml::listData(Filial::model()->findAll(), 'ID_FILIAL', 'NOMBRE_FILIAL'), array('empty' => 'Seleccione')); ?>
		<?php echo $form->error($model,'FILIAL_ID_FILIAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->